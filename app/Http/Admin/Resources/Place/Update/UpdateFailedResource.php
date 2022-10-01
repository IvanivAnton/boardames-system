<?php

namespace App\Http\Admin\Resources\Place\Update;

class UpdateFailedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Place has not been updated due to server error.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }
}
