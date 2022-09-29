<?php

namespace App\Domain\UseCases\Table\AddPlayer;

class RequestModel
{
    private int $tableId;

    public function __construct(array $validatedFields)
    {
        $this->tableId = $validatedFields['tableId'];
    }

    /**
     * @return int
     */
    public function getTableId(): int
    {
        return $this->tableId;
    }
}
