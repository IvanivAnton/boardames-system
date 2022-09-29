<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\PlayerInterface;
use App\Domain\Interfaces\Factories\PlayerFactoryInterface;
use App\Models\Player;

class PlayerFactory implements PlayerFactoryInterface
{
    public function make(array $attributes = []): PlayerInterface
    {
        return new Player($attributes);
    }
}
