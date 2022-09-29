<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

class PlayerDoesNotExists extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Such player does not exists.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
