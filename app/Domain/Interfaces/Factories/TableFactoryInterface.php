<?php

namespace App\Domain\Interfaces\Factories;

use App\Domain\Interfaces\Entities\TableEntityInterface;

interface TableFactoryInterface
{
    public function make(array $attributes = []): TableEntityInterface;
}
