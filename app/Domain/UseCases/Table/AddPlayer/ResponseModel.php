<?php

namespace App\Domain\UseCases\Table\AddPlayer;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use App\Domain\Interfaces\Entities\TableEntityInterface;

class ResponseModel
{
    private ?TableEntityInterface $table;
    private ?PlayerEntityInterface $player;

    /**
     * @param TableEntityInterface|null $table
     * @param PlayerEntityInterface|null $player
     */
    public function __construct(?TableEntityInterface $table = null, ?PlayerEntityInterface $player = null)
    {
        $this->table = $table;
        $this->player = $player;
    }

    /**
     * @return TableEntityInterface
     */
    public function getTable(): TableEntityInterface
    {
        return $this->table;
    }

    /**
     * @return PlayerEntityInterface
     */
    public function getPlayer(): PlayerEntityInterface
    {
        return $this->player;
    }
}
