<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\EventEntityInterface;

interface EventFactoryInterface
{
    public function make(array $attributes = []): EventEntityInterface;
}
