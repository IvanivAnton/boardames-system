<?php

namespace App\Http\Admin\Resources\Event\Add;

class EventIntersectionResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'There is event in this on this time already.'
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(422);
    }
}
