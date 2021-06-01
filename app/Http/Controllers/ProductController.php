<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Auth;
class ProductController extends Controller
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
    public function index()
    {
        $product = Product::statusproduct();
        return view('pages.tables.showProduct',compact('product'));
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
    public function destroy($pro_id)
    {
        $deletePro = Product::find($pro_id);
        $deletePro->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }

    public function silent($pro_id){
     
        $silentPro = Product::where('id',$pro_id)->update(array('status'=>'0'));
        return response()->json(['success'=>'Post Deleted successfully']);
   }

   public function proStatusOn($pro_id){
     
    $silentPro = Product::where('id',$pro_id)->update(array('status'=>'1'));
    return response()->json(['success'=>'Post Deleted successfully']);
}

public function showProSubProducts($pro_id){
    $proName = Product::find($pro_id);
 
    $subProduct = Product::find($pro_id)->subproduct;
    return view('pages.tables.showAllProducts',compact('subProduct','proName'));
}

}
