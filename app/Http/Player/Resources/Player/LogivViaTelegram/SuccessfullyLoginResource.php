<?php

namespace App\Http\Player\Resources\Player\LogivViaTelegram;

use App\Domain\Interfaces\Entities\PlayerInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessfullyLoginResource extends JsonResource
{
    protected PlayerInterface $player;

    /**
     * @param PlayerInterface $player
     */
    public function __construct(PlayerInterface $player)
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
