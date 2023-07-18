<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdusComanda;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comanda extends Model
{
    protected $table = 'comenzi';

    protected $fillable = [
        'user_id', 'nr', 'nume',
        'prenume', 'email', 'adresa', 'tara', 'oras', 'codp',
        'telefon', 'plata', 'numecard', 'nrcard', 'datacard',
        'cvv', 'status', 'total',
    ];
    public function produseComanda(): HasMany
    {
        return $this->hasMany(ProdusComanda::class, 'comanda_id', 'id');
    }
    use HasFactory;
}
