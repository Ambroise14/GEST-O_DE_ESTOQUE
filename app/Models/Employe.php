<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
   protected $table="employes";
   protected $fillable=['nome','departement_id','login','cpf','salaire','status','experience'];

   public function function(){
      return $this->belongsTo(Departement::class,'departement_id','id');
   }
}
