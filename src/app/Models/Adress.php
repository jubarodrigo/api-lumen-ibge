<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
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
