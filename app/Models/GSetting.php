<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'pageName', 'section','content','status'
       ];
}
