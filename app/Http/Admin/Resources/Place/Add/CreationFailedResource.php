<?php

namespace App\Http\Admin\Resources\Place\Add;

class CreationFailedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Place has not been created due to server error.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }
}
