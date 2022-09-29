<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;

class TableDoNotExists extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table with such id do not exists'
        ];
    }
}
