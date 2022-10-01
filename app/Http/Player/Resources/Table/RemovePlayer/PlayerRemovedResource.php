<?php

namespace App\Http\Player\Resources\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

class PlayerRemovedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected PlayerEntityInterface $player;

    /**
     * @param PlayerEntityInterface $player
     */
    public function __construct(PlayerEntityInterface $player)
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
