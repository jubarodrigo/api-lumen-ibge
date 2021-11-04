<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'uf',
        'bairro',
        'cities_id',
        'status',
    ];
}
