<?php

namespace App\Models;
use App\Models\ImaginiEv;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveniment extends Model
{
    protected $table='evenimente';
    protected $fillable=[
        'nume','user_id'
    ];
    public function imagini(){
        return $this->hasMany(ImaginiEv::class);
    }
    use HasFactory;
}
