<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::statusproduct();
        return $product;
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
        $proInsert = new Product();
       
        $proInsert->proName = $request->proName;
        $proInsert->proBrnad = $request->proBrand;
        $proInsert->status = 1;
        $users = User::find($request->get('user_id')); 
        $proInsert->user()->associate($users);
    
        $category = Category::find($request->get('cat_id'));
        $proInsert->backcatproduct()->associate($category);
      $proInsert->save();
    //     $data =   $category->catproduct()->save($proInsert);
    //   return $data;
    //     $user = User::find($request->get('user_id'));
       
    //     $category = Category::find($request->get('cat_id'));
     
    //    $post->category()->save($proInsert);
       
       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletePro = Product::find($id);
        $deletePro->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }
}
