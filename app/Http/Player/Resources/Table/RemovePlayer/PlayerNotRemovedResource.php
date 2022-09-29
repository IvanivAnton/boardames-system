<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

class PlayerNotRemovedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Player has not been removed due to error'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }
}
