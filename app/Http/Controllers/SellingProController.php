<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellProduct;
class SellingProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $selling = SellProduct::all();
         return view('pages.tables.showSellPro',compact('selling'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sellingData = SellProduct::find($id);
        $userData = SellProduct::find($id)->backusersell;
        $subprodata = SellProduct::find($id)->backproductsell;
    
        if($userData){
            $sellpaypal = SellProduct::find($id)->sellpaypal;
            $sells = $sellpaypal->count();
            if($sells>0){
               
                return view('pages.tables.showSellPro',compact('sellingData','userData','subprodata','sellpaypal'));
         
            }else{
                $sellbank = SellProduct::find($id)->sellbank;
                $sellbanks = $sellbank->count();
                if($sellbanks>0){
                  return view('pages.tables.showSellPro',compact('sellingData','userData','subprodata','sellbank'));
         
                }else{
                $sellstripe = SellProduct::find($id)->sellstripe;
             return view('pages.tables.showSellPro',compact('sellingData','userData','subprodata','sellstripe'));
         
            }
               
        }
         
        }
        // return view('pages.tables.showSellPro',compact('sellingData','userData','subprodata'));
    
    
    
        //   if($id){
       
    //     $sell = SellProduct::find($id)->sellpaypal;
    //     return $
    //    if($sell){
    //     return $sell; 
    //    }
    //     $countsSell = $sell->count();
    //     if($countsSell==0){
    //         $sells = SellProduct::find($id)->sellbank;
    //           echo "sell abnk"; 
    //     }else{
    //         $sell = SellProduct::find($id)->sellstripe;
    //         return $sell; 
            
    //        }
            
           
    //       }
    
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
        //
    }
}
