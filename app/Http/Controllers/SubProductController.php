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
        $subPro = SubProduct::subProStatus();
        
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
