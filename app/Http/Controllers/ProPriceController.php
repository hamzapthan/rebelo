<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use App\Models\ProPrice;
class ProPriceController extends Controller
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
        $insertPrice =  new ProPrice();
        $subpro = Storage::find($request->get('store_id'));
        $insertPrice->backstorageproprice()->associate($subpro);
      
        $insertPrice->new = $request->new; 
        $insertPrice->working = $request->working; 
        $insertPrice->dead    = $request->dead; 
        $insertPrice->prob1   = $request->prob1; 
        $insertPrice->prob2   = $request->prob2; 
        $insertPrice->prob3   =  $request->prob3; 
        $insertPrice->prob4 = $request->prob4; 
        $insertPrice->prob5 = $request->prob5; 
        $insertPrice->prob6 = $request->prob6; 
        $insertPrice->prob7 = $request->prob7; 
        $insertPrice->prob8 = $request->prob8; 
        $insertPrice->prob9 = $request->prob9; 
        $insertPrice->prob10  = $request->prob10; 
        $insertPrice->prob11  = $request->prob11; 
        $insertPrice->prob12  = $request->prob12; 
        $insertPrice->status  = 1; 
        $insertPrice->save();
        return $insertPrice;
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
       
        $storagePrice = ProPrice::find($id);

    return view('pages.forms.editPrice',compact('storagePrice')); 
    }

   
    public function update(Request $request, $id)
    {
        $updatePrice = ProPrice::find($id);
        $updatePrice->new = $request->new;
        $updatePrice->working = $request->working;
        $updatePrice->dead = $request->dead;
        $updatePrice->prob1 = $request->prob1;
        $updatePrice->prob2 = $request->prob2;
        $updatePrice->prob3 = $request->prob3;
        $updatePrice->prob4 = $request->prob4;
        $updatePrice->prob5 = $request->prob5;
        $updatePrice->prob6 = $request->prob6;
        $updatePrice->prob7 = $request->prob7;
        $updatePrice->prob8 = $request->prob8;
        $updatePrice->prob9 = $request->prob9;
        $updatePrice->prob10 = $request->prob10;
        $updatePrice->prob11 = $request->prob11;
        $updatePrice->prob12 = $request->prob12;
        $updatePrice->status = 1;
        $updatePrice->save();
        return redirect()->back()->with('message','Data Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
