<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'id',
        'id_ibge',
        'nome',
        'uf',
        'status',
    ];
}
