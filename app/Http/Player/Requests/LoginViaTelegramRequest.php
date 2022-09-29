<?php

namespace App\Http\Player\Requests;

class LoginViaTelegramRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'hash' => 'required|string',
            'id' => 'required',
            'last_name' => 'nullable|string',
            'first_name' => 'nullable|string',
            'username' => 'nullable|string',
            'auth_date' => 'required',
            'photo_url' => 'nullable|string',
        ];
    }
}
