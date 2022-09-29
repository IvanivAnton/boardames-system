<?php

namespace App\Http\Player\Resources\Table\Update;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateNotAllowed extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'You do not have rights to update this table.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(403);
    }


}
