<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use App\Models\SubProduct;
use App\Models\ProPrice;
class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subProduct = SubProduct::subproductOn();
        return view('pages.forms.addStorage',compact('subProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $request->validate([
           'storage' => 'required',
           'subpro_id' => 'required',
           'new' => 'required',
           'working' => 'required',
           'dead' => 'required',
            ]);
            if(!$validate){
              return Redirect::back()->withErrors($validate);
            }else{
        $insertStorage =  new Storage();
        $subpro = SubProduct::find($request->get('subpro_id'));
        $insertStorage->backsubprooductstorage()->associate($subpro);
        $insertStorage->storage = $request->storage; 
        $insertStorage->status = 1; 
        $insertStorage->save();
      
        $proPrice = new ProPrice();
        $proPrice->new = $request->new;
        $proPrice->working = $request->working;
        $proPrice->dead = $request->dead; 
        $proPrice->prob1 = $request->prob1;
        $proPrice->prob2 = $request->prob2; 
        $proPrice->prob3 = $request->prob3;
        $proPrice->prob4 = $request->prob4;
        $proPrice->prob5 = $request->prob5;
        $proPrice->prob6 = $request->prob6;
        $proPrice->prob7 = $request->prob7;
        $proPrice->prob8 = $request->prob8;
        $proPrice->prob9 = $request->prob9;
        $proPrice->prob10 = $request->prob10;
        $proPrice->prob11 = $request->prob11;
        $proPrice->prob12 = $request->prob12;
        $proPrice->status = 1;

        $insertStorage->price()->save($proPrice);
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
        $storagePrice = Storage::find($id)->price;
        
      return view('pages.tables.showSubStorage',compact('storagePrice'));
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
        $storeage_id = Storage::find($id)->delete();
        return response()->json(['success'=>'data deleted successsfully']);
    }
}
