<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TablePlayer extends \Illuminate\Database\Eloquent\Model implements \App\Domain\Interfaces\Entities\TablePlayerInterface
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'table_id',
        'player_id',
    ];

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    /**
     * @inheritDoc
     */
    public function getTableId(): int
    {
        return $this->attributes['table_id'];
    }

    /**
     * @inheritDoc
     */
    public function getPlayerId(): int
    {
        return $this->attributes['player_id'];
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
    public function getDeletedAt(): \DateTimeInterface
    {
        return $this->attributes['deleted_at'];
    }
}
