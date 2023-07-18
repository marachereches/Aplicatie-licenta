<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorit extends Model
{
    protected $table='favorite';
    protected $fillable=[
        'user_id','prod_id'
    ];
    public function produseFav(){
        return $this->belongsTo(Produs::class,'prod_id','id');
    }
    public static function nrfavorite ($produs_id){
        $cant=Favorit::where(['user_id'=>Auth::user()->id,'prod_id'=>$produs_id])->count();
        return $cant;
    }
    use HasFactory;
}
