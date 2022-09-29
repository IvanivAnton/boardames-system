<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;

class PlayerDoNotExists extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Player with such id do not exists'
        ];
    }
}
