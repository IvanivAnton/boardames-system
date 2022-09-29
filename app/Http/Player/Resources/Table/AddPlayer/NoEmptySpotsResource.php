<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

class NoEmptySpotsResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'There are max number of players at this table'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
