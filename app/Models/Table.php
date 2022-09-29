<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @method Table find($id)
 */
class Table extends \Illuminate\Database\Eloquent\Model implements \App\Domain\Interfaces\Entities\TableInterface
{
    use HasFactory;

    /**
     * @inheritDoc
     */
    public function getId(): ?int
    {
        return $this->attributes['id'];
    }

    /**
     * @inheritDoc
     */
    public function getGameId(): int
    {
        return $this->attributes['game_id'];
    }

    /**
     * @inheritDoc
     */
    public function getEventId(): int
    {
        return $this->attributes['event_id'];
    }

    /**
     * @inheritDoc
     */
    public function isGameWithDLC(): bool
    {
        return $this->attributes['is_game_with_dlc'];
    }

    /**
     * @inheritDoc
     */
    public function isOwnsABox(): bool
    {
        return $this->attributes['is_owns_a_box'];
    }

    /**
     * @inheritDoc
     */
    public function getNumberOfPlayers(): int
    {
        return $this->attributes['number_of_players'];
    }

    /**
     * @inheritDoc
     */
    public function getStartTime(): string
    {
        return $this->attributes['start_time'];
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->attributes['created_at'];
    }

    /**
     * @inheritDoc
     */
    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->attributes['deleted_at'];
    }

    /**
     * @inheritDoc
     */
    public function getPlayerId(): int
    {
        return $this->attributes['player_id'];
    }
}
