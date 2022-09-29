<?php

namespace App\Domain\UseCases\Table\Delete;

use App\Domain\Interfaces\Entities\TableInterface;

class ResponseModel
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
