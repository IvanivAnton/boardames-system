<?php

namespace App\Http\Player\Resources\Player\LogivViaTelegram;

use App\Domain\Interfaces\Entities\PlayerInterface;

class SuccessfullyLoginResource extends \Illuminate\Foundation\Http\FormRequest
{
    protected PlayerInterface $player;

    /**
     * @param PlayerInterface $player
     */
    public function __construct(PlayerInterface $player)
    {
        $this->player = $player;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->player->getId(),
        ];
    }


}
