<?php

namespace App\Http\Requests;

class AddressesRequest
{
    public static function rules()
    {
        return [
            "learning_institution" => "required|json",
            "document_picture" => "required|file",
            "self_picture" => "required|file",
        ];
    }
}
