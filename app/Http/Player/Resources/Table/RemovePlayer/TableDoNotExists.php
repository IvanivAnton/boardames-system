<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

class TableDoNotExists extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table with such id do not exists'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
