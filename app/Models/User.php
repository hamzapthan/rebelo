<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function category(){
        return $this->hasMany(Category::class,'user_id','id');
    }
    public function sellproduct(){
        return $this->hasMany(SellProduct::class,'user_id','id');
    }

    public function userproduct(){
        return $this->hasMany(Product::class,'user_id','id');
    }
    
    public function usersubproduct(){
        return $this->hasMany(SubProduct::class,'user_id','id');
    }
    public function scopeuseradmin(){
        return $this->where('role',1)->get();
    }


     public function scopedatainsert($query,$id){
        return $query->join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->where('model_has_roles.model_id',$id)
        ->select('roles.*')
        ->get();
        
     }

    public function scopeshowUser($query,$id){
        return $query->whereNotIn('id',[$id])
        ->where('role',1)  
        ->get();
    }
    


    public function scopeshowFrontUser($query){
        return $query->where('role',0)->get();
    }

    public function scopecountFrontendCustomer($query){
        return $query->where('role',0)->count();
    }

    public function scopecountAdminCustomer($query){
        return $query->where('role',1)->count();
    }

}

