<?php

namespace App\Domain\UseCases\Game\Delete;

use App\Domain\Interfaces\Entities\GameInterface;

class ResponseModel
{
    private GameInterface $game;

    /**
     * @param GameInterface $gameDay
     */
    public function __construct(GameInterface $gameDay)
    {
        $this->game = $gameDay;
    }

    /**
     * @return GameInterface
     */
    public function getGame(): GameInterface
    {
        return $this->game;
    }
}
