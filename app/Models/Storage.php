<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $fillable = [
        'subpro_id',
        'storage', 
    ];
    
    public function backsubprooductstorage(){
        return $this->belongsTo(SubProduct::class,'subpro_id','id');
     }

     public function storageproprice(){
         return $this->hasMany(Storage::class,'store_id','id');
     }

     public function price(){
        return $this->hasMany(ProPrice::class,'store_id','id');
    }
     
}

