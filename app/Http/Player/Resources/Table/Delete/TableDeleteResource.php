<?php

namespace App\Http\Player\Resources\Table\Delete;

use Illuminate\Http\Resources\Json\JsonResource;

class TableDeleteResource extends JsonResource
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->id
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
