<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends \Illuminate\Database\Eloquent\Model implements \App\Domain\Interfaces\Entities\PlaceInterface
{
    use HasFactory, SoftDeletes;

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
    public function getName(): string
    {
        return $this->attributes['name'];
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): ?string
    {
        return $this->attributes['address'];
    }

    /**
     * @inheritDoc
     */
    public function getLatitude(): ?float
    {
        return $this->attributes['latitude'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getLongitude(): ?float
    {
        return $this->attributes['longitude'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getNumberOfTables(): int
    {
        return $this->attributes['number_of_tables'];
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
