<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SubProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use File;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;


use Illuminate\Support\Facades\Validator;
class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
     }
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = SubProduct::with('subprooductstorage')->orderBy('status', 'DESC')->get();

        return DataTables::of($data)
                ->addColumn('action1', function($data){
                    return $data->subName;
                })
                ->addColumn('action2', function($data){
                    return $data->subBrnad;
                })
                ->addColumn('action3', function($data){
                    return $data->backproproduct->proName;
                })
                ->addColumn('action4', function($data){
                    $hyper = '<a href="'.route('show.subPro',$data->id) .'">View</a>';
                    return $hyper;

                })
                ->addColumn('action5', function($data){

                    if($data->status == 1){
                    $actionbtn =  '<div id="switch_'.$data->id.'"><label class="switch">
                    <input type="checkbox" checked onchange="change_status_inactive('.$data->id.')">
                    <span class="slider round"></span>
                </label></div>';
                     return $actionbtn;
                  }else{
                    $actionbtn =  '<div id="switch_'.$data->id.'"><label class="switch">
                    <input type="checkbox"  onchange="change_status_active( '.$data->id.' )">
                    <span class="slider round"></span>
                </label></div>';
                    return  $actionbtn;
               }
                })
               ->addColumn('action6', function($data){
                    $actions = '<a href="'. route('subpro.storage',$data->id) .'">Storage('.count($data->subprooductstorage).') </a>';
                   return $actions;
                })

                ->editColumn('action7', function($data){

                    $route = route("delete.subPro",$data->id);
                    $actionssbtn = '<a href="'.route('subpro.edit',$data->id) .'"><button   type="button"  class="edit btn btn-primary btn-sm">Edit</button></a> ';
                    $actionssbtn .= '<button type="button" id="delete_row"  class="edit btn btn-primary btn-sm" onclick="delete_pro('.$data->id.',this)">Delete</button></div>';

                    return $actionssbtn;

                })

                ->rawColumns(['action1','action2','action3','action4','action5','action6','action7'])
                ->make(true);
        }


     return view('pages.tables.showSubProduct');


        // return view('pages.tables.showSubProduct',compact('subProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::productons();
        return view('pages.forms.addSubProduct',compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validated = $request->validate([
            'subName' => 'required',
            'subBrnad' => 'required',
            'subColour' => 'required',
            'subImage' => 'required',
            'subImage.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'subDetail' => 'required',
            'subMetaTitle' => 'required',
            'subMetaDesc' => 'required',
            'subMetaKeyword' => 'required',
             ]);

         if(!$validated){
            return redirect()->back()->withErrors($validated);
         }else{
            foreach($request->file('subImage') as $image)
            {
            $imageName=$image->getClientOriginalName();
            $file_name = time().rand(100,999).$imageName;
            $image->move(public_path().'/project/', $file_name);
            $subproImage = url('project/'.$file_name);
            $fileNames[] = $subproImage;
            }
            $images = json_encode($fileNames);
            $user_id =   Auth::user()->id;
            $pro_id = $request->pro_id;
            $addCategory = SubProduct::updateOrCreate(['id'=>$request->id],[
            'subName' => $request->subName,
            'subBrnad'  => $request->subBrnad,
            'subColour'  => $request->subColour,
            'subImage' => $images,
            'subDetail'    => $request->subDetail,
            'status'  => 1,
            'subMetaTitle'  => $request->subMetaTitle,
            'subMetaDesc'    => $request->subMetaDesc,
            'subMetaKeyword'  => $request->subMetaKeyword,
           ]);

           $users = User::find($user_id);
           $addCategory->user()->associate($users);

         $product = Product::find($pro_id);
         $addCategory->backproproduct()->associate($product);

         $addCategory->save();
         return redirect()->back()->with('message','Data inserted Successfully');

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subProSingle = Subproduct::find($id);
         $product = SubProduct::find($id);
         $proName = $product->backproproduct->proName;
        return view('pages.tables.showAllProducts',compact('subProSingle','proName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subproUpdate = SubProduct::find($id);
        return view('pages.forms.addSubProduct',compact('subproUpdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


       if($request->has('subImage')){
        foreach($request->file('subImage') as $image)
            {
            $imageName=$image->getClientOriginalName();
            $file_name = time().rand(100,999).$imageName;
            $image->move(public_path().'/project/', $file_name);
            $subproImage = url('project/'.$file_name);

            $fileNames[] = $subproImage;
            }
            $images = json_encode($fileNames);
       }else{
             $update = SubProduct::find($id);
             $images =  $update->subImage;
       }
         $updateSubPro = SubProduct::find($id);
         $user = User::find($request->get('user_id'));
         $updateSubPro->user()->associate($user);
         $product = Product::find($request->get('pro_id'));
         $updateSubPro->backproproduct()->associate($product);
         $updateSubPro->subName = $request->subName;
         $updateSubPro->subBrnad = $request->subBrnad;
         $updateSubPro->subDetail = $request->subDetail;
         $updateSubPro->subColour = $request->subColour;
         $updateSubPro->subImage = $images;
         $updateSubPro->subMetaTitle = $request->subMetaTitle;
         $updateSubPro->subMetaDesc = $request->subMetaDesc;
         $updateSubPro->subMetaKeyword = $request->subMetaKeyword;
         $updateSubPro->status = 1;
         $updateSubPro->save();

       return redirect()->back()->with('message', 'Data Updated Successfully!');
    //
}

     public function destroy(Request $request)
    {     $id = $request->id;
        $subProDelete = SubProduct::find($id);
        $subProDelete->delete();
        return response()->json(['message'=>'Data Deleted Successfully']);
    }

    public function silent(Request $request){
        $id = $request->id;
        $silentPro = SubProduct::where('id',$id)->update(array('status'=>'0'));
        return response()->json(['message'=>'Product Deactivated successfully']);
   }

   public function subproStatusOn(Request $request){
        $id = $request->id;
    $silentPro = SubProduct::where('id',$id)->update(array('status'=>'1'));
    return response()->json(['message'=>'Product Activated successfully']);
   }
   public function image($id){

    $subProImage = SubProduct::find($id);
    return view('pages.forms.subProImage',compact('subProImage'));

   }

   public function deleteimage($subpro_id,$image){

       $post = SubProduct::find($subpro_id);

       $subproImage = url('project/'.$image);

       File::delete($image);
       $images=json_decode($post->subImage);
       $_image=[];
       $_image[]=$subproImage;
       $post->subImage=json_encode(array_values(array_diff($images,$_image)));
       $post->save();
       return response()->json(['code'=>'200','message'=>'data is deleted']);


   }

   public function subProStorage($id){

    $subStorage = SubProduct::find($id)->subprooductstorage;

   return view('pages.tables.showSubStorage',compact('subStorage','id'));

   }

}
