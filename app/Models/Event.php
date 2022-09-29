<?php

namespace App\Models;

use App\Domain\Interfaces\Entities\EventInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements EventInterface
{
    use HasFactory;

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
    public function getDate(): \DateTimeInterface
    {
        return $this->attributes['date'];
    }

    /**
     * @inheritDoc
     */
    public function getDefaultGameStartTime(): string
    {
        return $this->attributes['start_time'];
    }

    /**
     * @inheritDoc
     */
    public function getPlaceId(): int
    {
        return $this->attributes['place_id'];
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

    public function getNumberOfTables(): int
    {
        return $this->attributes['number_of_tables'];
    }
}
