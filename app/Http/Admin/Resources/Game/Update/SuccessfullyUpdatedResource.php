<?php

namespace App\Http\Admin\Resources\Game\Update;

use App\Domain\Interfaces\Entities\GameEntityInterface;

class SuccessfullyUpdatedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected GameEntityInterface $game;

    /**
     * @param GameEntityInterface $game
     */
    public function __construct(GameEntityInterface $game)
    {
        $this->game = $game;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->game->getId(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
