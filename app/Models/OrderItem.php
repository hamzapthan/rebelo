<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

   public function backtosubproduct(){
       return $this->belongsTo(SubProduct::class,'subpro_id','id');
   }

}
