<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\EventEntityInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Models\EventEntity;

class EventFactory implements EventFactoryInterface
{
    public function make(array $attributes = []): EventEntityInterface
    {
        return new EventEntity($attributes);
    }
}
