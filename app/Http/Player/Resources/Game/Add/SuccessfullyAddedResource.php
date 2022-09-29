<?php

namespace App\Http\Player\Resources\Game\Add;

use App\Domain\Interfaces\Entities\GameInterface;

class SuccessfullyAddedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected GameInterface $game;

    /**
     * @param GameInterface $game
     */
    public function __construct(GameInterface $game)
    {
        $this->game = $game;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->game->getId(),
        ];
    }


}
