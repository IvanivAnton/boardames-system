<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\TableInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;

class TableFactory implements TableFactoryInterface
{

    public function make(array $attributes = []): TableInterface
    {
        return new Table($attributes);
    }
}
