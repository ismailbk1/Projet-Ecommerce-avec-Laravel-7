<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
   // protected $table='categories';
   public function product(){
    return $this->hasMany(Produit::class , 'categorie_id', 'id');
   }
}
