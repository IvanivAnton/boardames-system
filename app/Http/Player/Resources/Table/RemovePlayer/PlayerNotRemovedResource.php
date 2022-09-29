<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;

class PlayerNotRemovedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Player has not been removed due to error'
        ];
    }
}
