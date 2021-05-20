<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        $category = Category::all();
        return $category;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $imageName=$request->file('image')->getClientOriginalName();
        $file_name = time().rand(100,999).$imageName;
        $request->file('image')->move(public_path().'/project/', $file_name);  
        $catimage = url('project/'.$file_name);   
        
        $catInsert = new Category();
        $catInsert->catName = $request->catName;
        $catInsert->catDetail = $request->catDetail;
        $catInsert->image = $catimage; 
        $catInsert->status = 1;
        $post = User::find($request->get('user_id'));
      
       $post->category()->save($catInsert);
       
       
         return response()->json(['code'=>'200','message'=>'Successful'],200);
        
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
        $imageName=$request->file('image')->getClientOriginalName();
        $file_name = time().rand(100,999).$imageName;
        $request->file('image')->move(public_path().'/project/', $file_name);  
        $catImage = url('project/'.$file_name);   
       
        
          $updateCat = Category::find($id);
          $updateCat->catName = $request->catName;
          $updateCat->catDetail = $request->catDetail;
          $updateCat->image = $catImage; 
          $updateCat->status = 1;
          $post = User::find($request->get('user_id'));
          $post->category()->save($updateCat);
      
        return response()->json(['code'=>'200','message'=>'Successful'],200);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete_id = Category::find($id);
        $delete_id->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }
}
