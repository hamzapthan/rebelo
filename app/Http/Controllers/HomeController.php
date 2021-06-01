<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\SubProduct;
use App\Models\SellProduct;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   //  echo  Auth::user()->id; 
       $countFrontendCustomer = User::countFrontendCustomer();
       $countAdminCustomer = User::countAdminCustomer();
       $deliveredOrders = Order::deliveredOrders();
       $pendingOrders = Order::pendingOrders();
       $subProduct = SubProduct::countsubProducts();
       $countIncome = Order::countincome();
       $pendingSellPro = SellProduct::pendingSellPro();
       $receivedSellPro = SellProduct::receivedSellPro();
       $orderAll = Order::pendings();
       
//    return $receivedSellPro;
       return view('dashboard',compact('countAdminCustomer','countFrontendCustomer','pendingOrders','deliveredOrders',
     'subProduct','countIncome','pendingSellPro','receivedSellPro','orderAll'));
       // if(Auth::user()->role == 0){
       //  return view('/dashboard'); 
       // }else{
       //  echo "role is not defined";
       // }

       
    }
}
