<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

class ResponseModel
{
    private PlayerEntityInterface $player;

    /**
     * @param PlayerEntityInterface $player
     */
    public function __construct(PlayerEntityInterface $player)
    {
        $this->player = $player;
    }

    /**
     * @return PlayerEntityInterface
     */
    public function getPlayer(): PlayerEntityInterface
    {
        return $this->player;
    }
}
