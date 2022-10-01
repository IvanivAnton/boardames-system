<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\GameEntityInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
use App\Models\GameEntity;

class GameFactory implements GameFactoryInterface
{
    public function make(array $attributes = []): GameEntityInterface
    {
        return new GameEntity($attributes);
    }
}
