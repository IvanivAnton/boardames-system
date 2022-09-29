<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Interfaces\Entities\TableInterface;

interface TableServiceInterface
{
    public function canCurrentPlayerEditTable(int $tableId): bool;
}
