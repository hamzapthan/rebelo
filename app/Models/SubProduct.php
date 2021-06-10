<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    use HasFactory;
    protected $fillable = [

        'pro_id',
        'user_id',
        'subName',
        'subBrnad',
        'subDetail',
        'subColour',
        'subImage',
        'subMetaTitle',
        'subMetaDesc',
        'subMetaKeyword',
        'status',

    ];
    protected $with = array('backproproduct');

     public function scopesubProStatus(){
         return $this->orderBy('status','DESC')->get();
}
     public function user(){
          return $this->belongsTo(User::class,'user_id','id');
      }

      public function backproproduct(){
          return $this->belongsTo(Product::class,'pro_id','id');
    }
    public function productsell(){
        return $this->hasMany(SellProduct::class,'subpro_id','id');
  }
    public function subprooductstorage(){
        return $this->hasMany(Storage::class,'subpro_id','id');
    }
    public function scopesubproductOn($query){
        return $query->where('status',1)->get();
    }

    public function orderitems(){
        return $this->hasMany(SubProduct::class,'subpro_id','id');
    }
    public function scopecountsubProducts($query){
        return $query->count();
    }

}
