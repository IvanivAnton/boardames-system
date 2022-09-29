<?php

namespace App\Http\Player\Resources\Table\Delete;

use Illuminate\Http\Resources\Json\JsonResource;

class TableDoesNotExistsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Table with this id does not exists.'
        ];
    }

}
