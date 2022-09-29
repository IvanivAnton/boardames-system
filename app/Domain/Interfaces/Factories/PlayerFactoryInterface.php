<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\PlayerInterface;

interface PlayerFactoryInterface
{
    public function make(array $attributes = []): PlayerInterface;
}
