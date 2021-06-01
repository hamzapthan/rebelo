<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProduct extends Model
{
    use HasFactory;

   public function backusersell(){
       return $this->belongsTo(User::class,'user_id','id');
   } 
   public function backproductsell(){
    return $this->belongsTo(SubProduct::class,'subpro_id','id');
}  
    public function scopependingSellPro($query){
      return $query->where('status',0)->count();
}   

public function scopereceivedSellPro($query){
    return $query->where('status',1)->count();
}   
  public function sellpaypal(){
      return $this->hasMany(SellPaypal::class,'sell_id','id');
  }
  public function sellbank(){
    return $this->hasMany(SellBank::class,'sell_id','id');
}
public function sellstripe(){
    return $this->hasMany(SellStripe::class,'sell_id','id');
}

}
