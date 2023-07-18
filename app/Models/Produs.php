<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorit;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produs extends Model
{
 protected $table='produse';
 protected $fillable = [
'nume', 'pret','descriere', 'image','fav','stoc','cat','cod'
  ];
 public function favorite():HasMany
 { 
 return $this->hasMany(Favorit::class,'prod_id','id');
 }
 use HasFactory;
}
