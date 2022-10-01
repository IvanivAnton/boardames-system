<?php

namespace App\Http\Player\Requests;

class AddPlayerRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
          'tableId' => 'required|integer'
        ];
    }
}
