<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\PlaceInterface;

interface PlaceFactoryInterface
{
    public function make(array $attributes = []): PlaceInterface;
}
