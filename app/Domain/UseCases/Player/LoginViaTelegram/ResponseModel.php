<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

use App\Domain\Interfaces\Entities\PlayerInterface;

class ResponseModel
{
    private PlayerInterface $player;

    /**
     * @param PlayerInterface $player
     */
    public function __construct(PlayerInterface $player)
    {
        $this->player = $player;
    }

    /**
     * @return PlayerInterface
     */
    public function getPlayer(): PlayerInterface
    {
        return $this->player;
    }
}
