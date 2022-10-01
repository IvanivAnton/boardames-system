<?php

namespace App\Http\Player\Resources\Game\Add;

use App\Domain\Interfaces\Entities\GameEntityInterface;

class NameNotUniqueResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Game with this name already exists'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }

}
