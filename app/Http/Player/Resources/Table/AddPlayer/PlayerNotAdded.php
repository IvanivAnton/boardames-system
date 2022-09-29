<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

class PlayerNotAdded extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Player has not been added to table due to error.'
        ];
    }

}
