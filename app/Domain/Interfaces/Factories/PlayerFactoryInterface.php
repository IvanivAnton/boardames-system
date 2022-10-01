<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

interface PlayerFactoryInterface
{
    public function make(array $attributes = []): PlayerEntityInterface;
}
