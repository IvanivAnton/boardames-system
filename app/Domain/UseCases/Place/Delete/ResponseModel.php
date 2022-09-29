<?php

namespace App\Domain\UseCases\Place\Delete;

use App\Domain\Interfaces\Entities\PlaceInterface;

class ResponseModel
{
    private PlaceInterface $place;

    /**
     * @param PlaceInterface $place
     */
    public function __construct(PlaceInterface $place)
    {
        $this->place = $place;
    }

    /**
     * @return PlaceInterface
     */
    public function getPlace(): PlaceInterface
    {
        return $this->place;
    }


}
