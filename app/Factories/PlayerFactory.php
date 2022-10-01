<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use App\Domain\Interfaces\Factories\PlayerFactoryInterface;
use App\Models\PlayerEntity;

class PlayerFactory implements PlayerFactoryInterface
{
    public function make(array $attributes = []): PlayerEntityInterface
    {
        return new PlayerEntity($attributes);
    }
}
