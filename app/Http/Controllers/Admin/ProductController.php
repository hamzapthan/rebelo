<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Auth;
use DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:subCat-list|subCat-create|subCat-edit|subCat-delete', ['only' => ['index','show']]);
        $this->middleware('permission:subCat-create', ['only' => ['create','store']]);
        $this->middleware('permission:subCat-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subCat-delete', ['only' => ['destroy']]);
     }
    // public function index()
    // {
       
    //     $product = Product::with('proproduct')->orderBy('status', 'DESC')->get();
      
    //     return view('pages.tables.showProduct',compact('product'));
    // }
    public function index(Request $request){
      
        if($request->ajax())
        {
            $data = Product::with('proproduct')->orderBy('status', 'DESC')->get();
            
        return DataTables::of($data)
                ->addColumn('action1', function($data){
                    return $data->proName;
                })
                ->addColumn('action2', function($data){
                    return $data->proBrnad;
                })
                ->addColumn('action3', function($data){
                    return $data->categories->catName;
                })
                ->addColumn('action4', function($data){
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
                ->addColumn('action5', function($data){
                    $actions = '<a href="'. route('pro.subpro',$data->id) .'">Product('. count($data->product) .') </a>';
                   return $actions;
                })
                ->editColumn('action6', function($data){
                    $route = route("delete.pro",$data->id);
                    $actionssbtn = '<a href="'.route('pro.edit',$data->id) .'"><button   type="button"  class="edit btn btn-primary btn-sm">Edit</button></a> ';  
                    $actionssbtn .= '<button type="button" id="delete_row"  class="edit btn btn-primary btn-sm" onclick="delete_pro('.$data->id.',this)">Delete</button></div>';
                   
                    return $actionssbtn;
                })
                
                ->rawColumns(['action1','action2','action3','action4','action5','action6'])
                ->make(true);
        }


     return view('pages.admin.subProduct');
        
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.forms.addProduct');
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
            'proName' => 'required',
            'proBrnad' => 'required',
            'cat_id' => 'required',
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

         }else{
        $user_id =   Auth::user()->id;
       $cat_id = $request->cat_id;
     
        $proInsert = new Product();
        $proInsert->proName = $request->proName;
        $proInsert->proBrnad = $request->proBrnad;
        $proInsert->status = 1;
        $users = User::find($user_id); 
        $proInsert->user()->associate($users);
        $category = Category::find($cat_id);
        $proInsert->backcatproduct()->associate($category);
        $proInsert->save();
        return redirect()->back()->with('message', 'Data Inserted Successfully!');
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
        $product = Product::find($id);
        return response($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editProduct = Product::find($id);
        return view('pages.forms.addProduct',compact('editProduct'));
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
        $validated = $request->validate([
            'proName' => 'required',
            'proBrnad' => 'required',
            'cat_id' => 'required',
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

         }else{
        $user_id =   Auth::user()->id;
       $cat_id = $request->cat_id;
     
        $proInsert = Product::find($id);
        $proInsert->proName = $request->proName;
        $proInsert->proBrnad = $request->proBrnad;
        $proInsert->status = 1;
        $users = User::find($user_id); 
        $proInsert->user()->associate($users);
        $category = Category::find($cat_id);
        $proInsert->backcatproduct()->associate($category);
        $proInsert->save();
        return redirect()->back()->with('message', 'Data Updated Successfully!');
         
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $pro_id = $request->id;
        $deletePro = Product::find($pro_id);
        $deletePro->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }

    public function silent(Request $request){
        $id = $_GET['id'];
        $silentPro = Product::where('id',$id)->update(array('status'=>'0'));
        return response()->json(['message'=>'Product status Deactivated']);
   }

   public function proStatusOn(Request $request){
      $id = $_GET['id'];
    $silentPro = Product::where('id',$id)->update(array('status'=>'1'));
    return response()->json(['message'=>'Product status Activated']);
}

public function showProSubProducts($pro_id){
    $proName = Product::find($pro_id);
 
    $subProduct = Product::find($pro_id)->subproduct;
    return view('pages.tables.showAllProducts',compact('subProduct','proName'));
}

}
