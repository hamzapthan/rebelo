<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubProduct;
use App\Models\User;
use App\Models\Product;
class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subPro = SubProduct::subProStatus();
        return $subPro;
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
        $imageName=$request->file('subImage')->getClientOriginalName();
        $file_name = time().rand(100,999).$imageName;
      
        $request->file('subImage')->move(public_path().'/project/', $file_name);  
        $subproImage = url('project/'.$file_name);   



 
        // foreach($request->file('subImage') as $image)
        // {
        //     return $image;
        //     $imageName=$image->getClientOriginalName();
        //     $file_name = time().rand(100,999).$imageName;
        //     $image->move(public_path().'/project/', $file_name);  
        //     $data = url('project/'.$file_name);   
        //     $fileNames[] = $data; 
        // }
        
        $insertSubPro = new SubProduct();
        $user = User::find($request->get('user_id'));
        $insertSubPro->user()->associate($user);
       $product = Product::find($request->get('pro_id'));
       $insertSubPro->backproproduct()->associate($product);
     
        $insertSubPro->subName = $request->subName;
        $insertSubPro->subBrnad = $request->subBrnad;
        $insertSubPro->subDetail = $request->subDetail;
        $insertSubPro->subColour = $request->subColour;
        $insertSubPro->subImage = $subproImage;
        $insertSubPro->subMetaTitle = $request->subMetaTitle;
        $insertSubPro->subMetaDesc = $request->subMetaDesc;
        $insertSubPro->subMetaKeyword = $request->subMetaKeyword;
        $insertSubPro->status = 1;
      
        $insertSubPro->save();
        return response($insertSubPro->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subProDelete = SubProduct::find($id);
        $subProDelete->delete();
        return response()->json(['success'=>'deletes']);
    }
}
