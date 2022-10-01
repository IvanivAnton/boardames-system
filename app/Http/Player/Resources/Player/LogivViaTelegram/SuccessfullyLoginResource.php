<?php

namespace App\Http\Player\Resources\Player\LogivViaTelegram;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessfullyLoginResource extends JsonResource
{
    protected PlayerEntityInterface $player;

    /**
     * @param PlayerEntityInterface $player
     */
    public function __construct(PlayerEntityInterface $player)
    {
        $this->player = $player;
    }

    public function toArray($request): array
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
