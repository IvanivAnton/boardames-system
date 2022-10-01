<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\GameEntityInterface;

interface GameFactoryInterface
{
    public function make(array $attributes = []): GameEntityInterface;
}
