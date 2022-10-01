<?php

namespace App\Http\Admin\Resources\Game\Delete;

class NoSuchGameResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Game with this id does not exists'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }

}
