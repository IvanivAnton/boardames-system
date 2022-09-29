<?php

namespace App\Http\Player\Requests;

class AddTableRequest extends \Illuminate\Foundation\Http\FormRequest
{
    public function rules(): array
    {
        return [
            'game_id' => 'required|integer',
            'event_id' => 'required|integer',
            'game_with_dlc' => 'nullable|boolean',
            'owns_a_box' => 'nullable|boolean',
            'number_of_players' => 'required|integer',
            'start_time' => 'required|string',
        ];
    }
}
