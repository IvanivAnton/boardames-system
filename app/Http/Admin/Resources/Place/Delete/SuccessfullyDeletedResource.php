<?php

namespace App\Http\Admin\Resources\Place\Delete;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;

class SuccessfullyDeletedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    private PlaceEntityInterface $place;

    /**
     * @param PlaceEntityInterface $place
     */
    public function __construct(PlaceEntityInterface $place)
    {
        $this->place = $place;
    }

    public function toArray($request): array
    {
        return [
          'id' => $this->place->getId(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
