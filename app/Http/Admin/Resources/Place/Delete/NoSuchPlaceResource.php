<?php

namespace App\Http\Admin\Resources\Place\Delete;

class NoSuchPlaceResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Place with such id does not exist.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
