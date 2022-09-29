<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\EventInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Models\Event;

class EventFactory implements EventFactoryInterface
{
    public function make(array $attributes = []): EventInterface
    {
        return new Event($attributes);
    }
}
