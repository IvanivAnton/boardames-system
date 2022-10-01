<?php

namespace App\Http\Player\Resources\Table\AddPlayer;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use App\Domain\Interfaces\Entities\TableEntityInterface;

class PlayerAddedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    protected PlayerEntityInterface $player;
    protected TableEntityInterface $table;

    /**
     * @param PlayerEntityInterface $player
     * @param TableEntityInterface $table
     */
    public function __construct(PlayerEntityInterface $player, TableEntityInterface $table)
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
