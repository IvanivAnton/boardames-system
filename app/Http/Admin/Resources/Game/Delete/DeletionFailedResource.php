<?php

namespace App\Http\Admin\Resources\Game\Delete;

class DeletionFailedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Game has not been deleted due to server error.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(500);
    }
}
