<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemorder extends Model
{
    public function product(){
        return $this->belongsTo(product::class);
    }
}
