<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

class TableDoesNotExists extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Such table does not exists.'
        ];
    }

}
