<?php

namespace App\Domain\UseCases\Table\Update;

use App\Domain\Interfaces\Entities\TableInterface;

class ResponseModel
{
    private TableInterface $table;

    public function __construct(TableInterface $table)
    {
        $this->table = $table;
    }

    /**
     * @return TableInterface
     */
    public function getTable(): TableInterface
    {
        return $this->table;
    }
}
