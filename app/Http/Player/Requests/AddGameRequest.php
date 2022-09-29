<?php

namespace App\Http\Player\Requests;

class AddGameRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'number_of_players' => 'required|integer',
        ];
    }
}
