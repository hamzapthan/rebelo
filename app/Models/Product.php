<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cat_id',
        'proName',
        'proBrand',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function backcatproduct()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
   
    public function scopestatusproduct(){
    
        return $this->orderBy('status', 'DESC')->get();
    }
    
    public function scopeproducton(){
    
        return $this->where('status', '1')->get();
    }
    

    public function proproduct(){
        return $this->hasMany(SubProduct::class,'pro_id','id');
    }

    public function subproduct(){
        return $this->hasMany(SubProduct::class,'pro_id','id')->orderBy('status','DESC');
    }

    
    
   
}
