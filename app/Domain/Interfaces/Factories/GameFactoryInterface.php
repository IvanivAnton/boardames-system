<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\GameInterface;

interface GameFactoryInterface
{
    public function make(array $attributes = []): GameInterface;
}
