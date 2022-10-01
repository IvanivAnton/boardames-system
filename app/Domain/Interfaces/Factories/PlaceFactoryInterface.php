<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;

interface PlaceFactoryInterface
{
    public function make(array $attributes = []): PlaceEntityInterface;
}
