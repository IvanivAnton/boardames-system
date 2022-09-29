<?php

namespace App\Http\Player\Resources\Table\Add;

class NoEmptySpotsResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'There are max number of tables for this event'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
