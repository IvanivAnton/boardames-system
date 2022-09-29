<?php

namespace App\Factories;

use App\Domain\Interfaces\Entities\TablePlayerInterface;
use App\Domain\Interfaces\Factories\TablePlayerFactoryInterface;
use App\Models\TablePlayer;

class TablePlayerFactory implements TablePlayerFactoryInterface
{

    public function make(array $attributes = []): TablePlayerInterface
    {
        return new TablePlayer($attributes);
    }
}
