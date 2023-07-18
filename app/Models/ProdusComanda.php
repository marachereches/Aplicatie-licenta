<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produs;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdusComanda extends Model
{
    protected $table = 'produse_comanda';
    protected $fillable = [
        'comanda_id', 'prod_id', 'cant', 'pret'
    ];
    public function produseCom():BelongsTo 
    {
        return $this->belongsTo(Produs::class,'prod_id','id');
    }
    use HasFactory;
}
