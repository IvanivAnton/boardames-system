<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\PlaceInterface;
use App\Domain\Interfaces\Factories\PlaceFactoryInterface;
use App\Models\Place;

class PlaceFactory implements PlaceFactoryInterface
{
    public function make(array $attributes = []): PlaceInterface
    {
        return new Place($attributes);
    }
}
