<?php

namespace App\Http\Player\Resources\Table\Delete;

use Illuminate\Http\Resources\Json\JsonResource;

class TableNotDeletedResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table has not been deleted due to error.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }


}
