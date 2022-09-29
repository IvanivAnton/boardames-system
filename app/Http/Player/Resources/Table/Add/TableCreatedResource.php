<?php

namespace App\Http\Player\Resources\Table\Add;

use App\Domain\Interfaces\Entities\TableInterface;

class TableCreatedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected TableInterface $table;

    /**
     * @param TableInterface $table
     */
    public function __construct(TableInterface $table)
    {
        parent::__construct($this->resource);
        $this->table = $table;
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->table->getId(),
            'number_of_players' => $this->table->getNumberOfPlayers(),
            'start_time' => $this->table->getStartTime(),
            'event_id' => $this->table->getEventId(),
            'game_id' => $this->table->getGameId(),
            'is_owns_box' => $this->table->isOwnsABox(),
            'is_game_with_dlc' => $this->table->isGameWithDLC(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
