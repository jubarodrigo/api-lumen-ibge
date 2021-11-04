<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'id',
        'logradouro',
        'numero',
        'bairro',
        'cities_id',
        'status',
    ];
}
