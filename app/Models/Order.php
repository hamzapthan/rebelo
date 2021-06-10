<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Order extends Model
{
    use HasFactory;

    public function orderDetail(){
        return $this->hasMany(OrderItem::class,'order_id','id');
      }

      public function scopependings($query){
        return $query->where('status',0)->orderBy('created_at','Desc')->get();
      }
      public function scopedelivered($query){
        return $query->where('status',1)->get();
      }
      public function scopeDeliveredOrders($query){
        return $query->where('status',1)->count();
      }
      public function scopependingOrders($query){
        return $query->where('status',0)->count();
      }
      public function scopecountincome($query){
        return $query->where('status',1)->sum('grand_total');
      }

      public function scopeorderCancel($query){
        return $query->where('status',2)->get();
      }
      public function scopeorderDeliverGraph($query){
        $date = Carbon::now();
        $to =$date->toDateString();
        $lastWeek = Carbon::now()->subHours(168);
        $from =$lastWeek->toDateString();
        return $query->whereBetween('created_at', [$from, $to])
        ->where('status',1)
        ->orderBy('created_at','Desc')
        ->get()
        ->groupBy(function($date) {
             return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
         });
    }
    public function scopeorderPendingGraph($query){
        $date = Carbon::now();
        $to =$date->toDateString();
        $lastWeek = Carbon::now()->subHours(168);
        $from =$lastWeek->toDateString();
        return $query->whereBetween('created_at', [$from, $to])
        ->where('status',0)
        ->orderBy('created_at','Desc')
        ->get()
        ->groupBy(function($date) {
             return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
         });
    }
    public function scopeordersales($query){
        $date = Carbon::now();
        $to =$date->toDateString();
        $lastWeek = Carbon::now()->subHours(168);
        $from = $lastWeek->toDateString();
        return $query->whereBetween('created_at', [$from, $to])
        ->where('payment_status',1)
        ->orderBy('created_at','Desc')
        ->get()
        ->groupBy(function($date) {
             return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
         });
    }

}
