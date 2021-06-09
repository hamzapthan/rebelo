<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\SubProduct;
use App\Models\SellProduct;
use Carbon\Carbon;
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
    
       $date = Carbon::now();
       $to =$date->toDateString();
       $lastWeek = Carbon::now()->subHours(168);
       $from =$lastWeek->toDateString();
    
       $frontendUsers = USER::whereBetween('created_at', [$from, $to])
       ->where('role',0)
       ->orderBy('created_at','Desc')    
       ->get()
       ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
        });
         return view('dashboard',compact('countAdminCustomer','countFrontendCustomer','pendingOrders','deliveredOrders',
     'subProduct','countIncome','pendingSellPro','receivedSellPro','orderAll','frontendUsers'));
       // if(Auth::user()->role == 0){
       //  return view('/dashboard'); 
       // }else{
       //  echo "role is not defined";
       // }

       
    }
}
