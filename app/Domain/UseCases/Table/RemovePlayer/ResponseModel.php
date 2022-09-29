<?php

namespace App\Domain\UseCases\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;
use App\Domain\Interfaces\Entities\TableInterface;

class ResponseModel
{
    private ?TableInterface $table;
    private ?PlayerInterface $player;

    /**
     * @param TableInterface|null $table
     * @param PlayerInterface|null $player
     */
    public function __construct(?TableInterface $table = null, ?PlayerInterface $player = null)
    {
        $this->table = $table;
        $this->player = $player;
    }

    /**
     * @return TableInterface
     */
    public function getTable(): TableInterface
    {
        return $this->table;
    }

    /**
     * @return PlayerInterface
     */
    public function getPlayer(): PlayerInterface
    {
        return $this->player;
    }
}
