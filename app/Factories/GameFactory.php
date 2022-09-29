<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\GameInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
use App\Models\Game;

class GameFactory implements GameFactoryInterface
{
    public function make(array $attributes = []): GameInterface
    {
        return new Game($attributes);
    }
}
