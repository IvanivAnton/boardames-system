<?php

namespace App\Http\Player\Resources\Table\Update;

use App\Domain\Interfaces\Entities\PlayerInterface;

class TableNotUpdated extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table has not been removed due to error'
        ];
    }
}
