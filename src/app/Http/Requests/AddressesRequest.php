<?php

namespace App\Http\Requests;

class AddressesRequest
{
    public static function rules()
    {
        return [
            "logradouro" => "required|string",
            "numero" => "integer",
            "bairro" => "required|string",
            "cities_id" => "required|integer",
        ];
    }
}
