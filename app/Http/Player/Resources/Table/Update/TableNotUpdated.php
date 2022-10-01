<?php

namespace App\Http\Player\Resources\Table\Update;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

class TableNotUpdated extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table has not been removed due to error'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }


}
