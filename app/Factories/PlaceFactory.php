<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;
use App\Domain\Interfaces\Factories\PlaceFactoryInterface;
use App\Models\PlaceEntity;

class PlaceFactory implements PlaceFactoryInterface
{
    public function make(array $attributes = []): PlaceEntityInterface
    {
        return new PlaceEntity($attributes);
    }
}
