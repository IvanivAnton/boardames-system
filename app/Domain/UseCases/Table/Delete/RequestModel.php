<?php

namespace App\Domain\UseCases\Table\Delete;

class RequestModel
{
    private int $tableId;

    public function __construct(array $validatedFields)
    {
        $this->tableId = $validatedFields['id'];
    }

    /**
     * @return int
     */
    public function getTableId(): int
    {
        return $this->tableId;
    }
}
