<?php

namespace App\Http\Player\Requests;

class RemovePlayerRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
          'table_id' => 'required|integer'
        ];
    }
}
