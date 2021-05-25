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


     public function scopesubProStatus(){
         return $this->orderBy('status','DESC')->get();
}
     public function user(){
          return $this->belongsTo(User::class,'user_id','id');
      }
      
      public function backproproduct(){
          return $this->belongsTo(Product::class,'pro_id','id');
    }
    public function subprooductstorage(){
        return $this->hasMany(Storage::class,'subpro_id','id');
    }
   
}
