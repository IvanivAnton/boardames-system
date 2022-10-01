<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\TableEntityInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Models\TableEntity;

class TableFactory implements TableFactoryInterface
{
    public function make(array $attributes = []): TableEntityInterface
    {
        return new TableEntity($attributes);
    }
}
