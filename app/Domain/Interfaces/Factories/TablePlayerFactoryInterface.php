<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\TablePlayerInterface;

interface TablePlayerFactoryInterface
{
    public function make(array $attributes = []): TablePlayerInterface;
}
