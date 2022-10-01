<?php

namespace App\Models;

use App\Domain\Interfaces\Entities\GameEntityInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameEntity extends Model implements GameEntityInterface
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'number_of_players',
    ];

    public function getId(): int
    {
        return $this->attributes['id'] ?? 0;
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getNumberOfPlayers(): int
    {
        return $this->attributes['number_of_players'] ?? 0;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->attributes['created_at'];
    }

    public function getDeletedAt(): \DateTimeInterface
    {
        return $this->attributes['deleted_at'];
    }
}
