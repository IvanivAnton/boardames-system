<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

use App\Domain\Interfaces\Entities\PlayerInterface;
use App\Domain\Interfaces\Entities\TableInterface;

class PlayerAddedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected PlayerInterface $player;
    protected TableInterface $table;

    /**
     * @param PlayerInterface $player
     * @param TableInterface $table
     */
    public function __construct(PlayerInterface $player, TableInterface $table)
    {
        parent::__construct($this->resource);
        $this->player = $player;
        $this->table = $table;
    }

    public function toArray($request): array
    {
        return [
            'player_id' => $this->player->getId(),
            'table_id' => $this->table->getId(),
        ];
    }


}
