<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $fillable = [
        "id",
        'logradouro',
        'numero',
        'uf',
        'bairro',
        'cities_id',
        'status',
    ];
}
