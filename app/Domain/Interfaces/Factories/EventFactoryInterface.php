<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\EventInterface;

interface EventFactoryInterface
{
    public function make(array $attributes = []): EventInterface;
}
