<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImaginiEv extends Model
{
    protected $table='imagini_Ev';
    protected $fillable=[
        'eveniment_id','imagine'
    ];

    use HasFactory;
}
