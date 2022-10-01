<?php

namespace App\Domain\Interfaces\Entities;

use Illuminate\Contracts\Auth\Authenticatable;

interface PlayerEntityInterface extends Authenticatable
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string;

    /**
     * @return string|null
     */
    public function getTelegramId(): ?string;

    /**
     * @return string|null
     */
    public function getLastName(): ?string;

    /**
     * @return string|null
     */
    public function getPhotoUrl(): ?string;

    /**
     * @return string
     */
    public function getUsername(): ?string;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt(): \DateTimeInterface;
}
