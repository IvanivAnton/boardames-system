<?php

namespace App\Domain\UseCases\Table\Update;

use App\Domain\Interfaces\Entities\TableEntityInterface;

class ResponseModel
{
    private TableEntityInterface $table;

    public function __construct(TableEntityInterface $table)
    {
        $this->table = $table;
    }

    /**
     * @return TableEntityInterface
     */
    public function getTable(): TableEntityInterface
    {
        return $this->table;
    }
}
