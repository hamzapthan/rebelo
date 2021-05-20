<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProPrice extends Model
{
    use HasFactory;
   protected $fillable= [
       'store_id',
       'new',
       'working',
       'dead',
       'prob1',
       'prob2',
       'prob3',
       'prob4',
       'prob5',
       'prob6',
       'prob7',
       'prob8',
       'prob9',
       'prob10',
       'prob11',
       'prob12',
       'status',
   ];

   public function backstorageproprice(){
       return $this->belongsTo(SubProduct::class,'store_id','id');
   }
}
