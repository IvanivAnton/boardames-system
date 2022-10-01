<?php

namespace App\Domain\UseCases\Game\Delete;

use App\Domain\Interfaces\Entities\GameEntityInterface;

class ResponseModel
{
    private GameEntityInterface $game;

    /**
     * @param GameEntityInterface $gameDay
     */
    public function __construct(GameEntityInterface $gameDay)
    {
        $this->game = $gameDay;
    }

    /**
     * @return GameEntityInterface
     */
    public function getGame(): GameEntityInterface
    {
        return $this->game;
    }
}
