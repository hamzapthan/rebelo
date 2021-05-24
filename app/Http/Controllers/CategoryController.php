<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use App\Models\User;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::status();
        return view('pages.tables.showCategory',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('pages.forms.addCategory');
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
            'catName' => 'required|unique:categories|max:25',
            'catDetail' => 'required',
            'image' => 'required',
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

         }else{

        $user_id = Auth::user()->id;
        $imageName=$request->file('image')->getClientOriginalName();
        $file_name = time().rand(100,999).$imageName;
        $request->file('image')->move(public_path().'/project/', $file_name);  
        $catImage = url('project/'.$file_name);   
       
        $catInsert = new Category();
        $catInsert->catName = $request->catName;
        $catInsert->catDetail = $request->catDetail;
        $catInsert->image = $catImage; 
        $catInsert->status = 1;
        $post = User::find($user_id);
        $catInsert->users()->associate($post);
        $catInsert->save();
      
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
        $category = Category::find($id);
        return response($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $editCategory = Category::find($id);
        return view('pages.forms.addCategory',compact('editCategory'));
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
            'catName' => 'required|unique:categories|max:25',
            'catDetail' => 'required',
            'image' => 'required',
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

         }else{


        $imageName=$request->file('image')->getClientOriginalName();
        $file_name = time().rand(100,999).$imageName;
        $request->file('image')->move(public_path().'/project/', $file_name);  
        $catImage = url('project/'.$file_name);   
       
        $user_id = Auth::user()->id;
          $updateCat = Category::find($id);
          $updateCat->catName = $request->catName;
          $updateCat->catDetail = $request->catDetail;
          $updateCat->image = $catImage; 
          $updateCat->status = 1;
          $post = User::find($user_id);
          $updateCat->users()->associate($post);
          $updateCat->save();
      
      return redirect()->back()->with('message', 'Data Updated Successfully!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cat_id)
    { 
        
        
        $delete_id = Category::find($cat_id);
        $delete_id->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }

    public function silent($cat_id)
    {
        $update = Category::where('id',$cat_id)->update(array('status'=>'0'));
       return response()->json(['success'=>'Post Deleted successfully']);
    }
    public function showCatPro($cat_id){
        $catName = Category::find($cat_id);
     
        $catProduct = Category::find($cat_id)->catproducts;
        return view('pages.tables.showAllProducts',compact('catProduct','catName'));
    }
    
    public function catStatusOn($cat_id)
    {
        $update = Category::where('id',$cat_id)->update(array('status'=>'1'));
       return response()->json(['success'=>'Post Deleted successfully']);
    }
    
}
