<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    }
