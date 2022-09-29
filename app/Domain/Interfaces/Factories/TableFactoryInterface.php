<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\TableInterface;

interface TableFactoryInterface
{
    public function make(array $attributes = []): TableInterface;
}
