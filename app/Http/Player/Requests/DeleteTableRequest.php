<?php

namespace App\Http\Player\Requests;

class DeleteTableRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }
}
