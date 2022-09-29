<?php

namespace App\Http\Player\Requests;

class UpdateTableRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'game_id' => 'nullable|integer',
            'event_id' => 'nullable|integer',
            'game_with_dlc' => 'nullable|boolean',
            'owns_a_box' => 'nullable|boolean',
            'number_of_players' => 'nullable|integer',
            'start_time' => 'nullable|string',
        ];
    }
}
