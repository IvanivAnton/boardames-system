<?php

namespace App\Domain\UseCases\Place\Add;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;

class ResponseModel
{
    private PlaceEntityInterface $place;

    /**
     * @param PlaceEntityInterface $place
     */
    public function __construct(PlaceEntityInterface $place)
    {
        $this->place = $place;
    }

    /**
     * @return PlaceEntityInterface
     */
    public function getPlace(): PlaceEntityInterface
    {
        return $this->place;
    }


}
