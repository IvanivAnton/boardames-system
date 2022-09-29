<?php

namespace App\Http\Player\Resources\Game\Add;

use App\Domain\Interfaces\Entities\GameInterface;

class NameNotUniqueResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Game with this name already exists'
        ];
    }
}
