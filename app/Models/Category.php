<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'catName',
        'catDetail',
        'image',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }




    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function catproduct()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }
    public function catproducts()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }


    // public function catproductstatus ()
    // {
    //     return $this->catproduct()->orderBy('status','desc')->get();
    // }

    public function scopestatus(){
        return $this->orderBy('status','DESC')->get();

    }


}
