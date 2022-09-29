<?php

namespace App\Http\Player\Resources\Table\Delete;

use Illuminate\Http\Resources\Json\JsonResource;

class DeleteNotAllowed extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'You do not have rights to delete this table.'
        ];
    }

}
