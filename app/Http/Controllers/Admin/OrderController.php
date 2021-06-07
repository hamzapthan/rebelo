<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:order-list', ['only' => ['index','orderDelivered','show','deliver','orderDeliver']]);
     }
    public function index()
    {
    $orderAll = Order::pendings();
    
    return view('pages.tables.showOrder',compact('orderAll'));
    }
    
    public function orderDelivered()
    {
    $orderAll = Order::delivered();
    return view('pages.tables.showOrder',compact('orderAll'));
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
        $orderAlls = Order::find($id);
       $orderDetail = Order::find($id)->orderDetail;
       $ordercount = Order::find($id)->orderDetail()->count();
     
      
      
      
       return view('pages.tables.showOrderItems',compact('orderAlls','orderDetail','ordercount'));
    }

    // public function showCancelOrder($id)
    // {
    //     $orderAlls = Order::find($id);
    //    $orderDetail = Order::find($id)->orderDetail;
    //    return view('pages.tables.showOrderItems',compact('orderAlls','orderDetail'));
    // }
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

    public function deliver($id)
    {
       
        $orderItem = OrderItem::where('id',$id)->update(array('status'=>'1'));
     return response()->json(['data'=>'success']);        
        
    }
    public function orderDeliver($id)
    {
        $orderItem = Order::where('id',$id)->update(array('status'=>'1'));
     return redirect()->back();
        
        
    }

    public function orderCanceled()
    {
       $cancelOrder =  Order::orderCancel();
       
       return view('pages.tables.showOrder',compact('cancelOrder'));    
    }

    public function statusOrderCancel($id)
    {
        $statusOrderDetail = Order::find($id)->orderDetail;
       foreach($statusOrderDetail as $change){
           $ids = $change->id;
           $changes = OrderItem::where('id',$ids)->update(array('status'=>'2'));
       }
          $orderItem = Order::where('id',$id)->update(array('status'=>'2'));
   
     return redirect()->back();
        }

}
