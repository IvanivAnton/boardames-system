<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends \Illuminate\Database\Eloquent\Model implements \App\Domain\Interfaces\Entities\PlayerInterface
{
    use HasFactory, Authenticatable, SoftDeletes;

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->attributes['id'] ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getFirstName(): ?string
    {
        return $this->attributes['first_name'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        return $this->attributes['username'];
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

    public function getLastName(): ?string
    {
        return $this->attributes['last_name'] ?? null;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->attributes['photo_url'] ?? null;
    }

    public function getTelegramId(): ?string
    {
        return $this->attributes['telegram_id'] ?? null;
    }
}
