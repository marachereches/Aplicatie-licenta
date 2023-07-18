<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cos extends Model
{
    use HasFactory;
    protected $table = 'cos';
    protected $fillable = [
        'user_id', 'prod_id', 'cant'
    ];

    public function produseCos()
    {
        return $this->belongsTo(Produs::class, 'prod_id', 'id');
    }
}
