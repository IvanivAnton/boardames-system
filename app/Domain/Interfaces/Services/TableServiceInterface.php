<?php

namespace App\Domain\Interfaces\Services;

interface TableServiceInterface
{
    public function canCurrentPlayerEditTable(int $tableId): bool;
}
