<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;

class PlayerRemovedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected PlayerInterface $player;

    /**
     * @param PlayerInterface $player
     */
    public function __construct(PlayerInterface $player)
    {
        $this->player = $player;
    }

    public function toArray($request)
    {
        return [
            'id' => $this->player->getId(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
