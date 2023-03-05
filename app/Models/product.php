<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="products";
   protected  $fillable=['ref','nome','description','valor','image','stoock','categoria_id'];
}