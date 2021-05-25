<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubProduct;
use App\Models\User;
use App\Models\Product;
use Auth;
class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subProduct = SubProduct::subProStatus();
        return view('pages.tables.showSubProduct',compact('subProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.forms.addSubProduct');
    
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
            'subDetail' => 'required',
            
            'subMetaTitle' => 'required',
            'subMetaDesc' => 'required',
            'subMetaKeyword' => 'required',
            
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

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
     $updateSubPro = SubProduct::find($id);
        $user = User::find($request->get('user_id'));
        $updateSubPro->user()->associate($user);
        $product = Product::find($request->get('pro_id'));
        $updateSubPro->backproproduct()->associate($product);
        $updateSubPro->subName = $request->subName;
        $updateSubPro->subBrnad = $request->subBrnad;
        $updateSubPro->subDetail = $request->subDetail;
        $updateSubPro->subColour = $request->subColour;
        $updateSubPro->subImage = $request->subImage;
        $updateSubPro->subMetaTitle = $request->subMetaTitle;
        $updateSubPro->subMetaDesc = $request->subMetaDesc;
        $updateSubPro->subMetaKeyword = $request->subMetaKeyword;
        $updateSubPro->status = 1;
      
        $updateSubPro->save();
        return response($updateSubPro);
    }

     public function destroy($id)
    { 
        $subProDelete = SubProduct::find($id);
        $subProDelete->delete();
        return response()->json(['success'=>'deletes']);
    }

    public function silent($id){
     
        $silentPro = SubProduct::where('id',$id)->update(array('status'=>'0'));
        return response()->json(['success'=>'Post Deleted successfully']);
   }

   public function subproStatusOn($id){
    
    $silentPro = SubProduct::where('id',$id)->update(array('status'=>'1'));
    return response()->json(['success'=>'Post Deleted successfully']);
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


}
