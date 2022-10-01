<?php

namespace App\Domain\UseCases\Table\Add;

use App\Domain\Interfaces\Entities\TableEntityInterface;

class ResponseModel
{
    private TableEntityInterface $table;

    /**
     * @param TableEntityInterface $table
     */
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
