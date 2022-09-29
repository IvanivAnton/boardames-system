<?php

namespace App\Domain\Interfaces\Entities;

interface TableInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return int
     */
    public function getGameId(): int;

    /**
     * @return int
     */
    public function getEventId(): int;

    /**
     * @return bool
     */
    public function isGameWithDLC(): bool;

    /**
     * @return bool
     */
    public function isOwnsABox(): bool;

    /**
     * @return int
     */
    public function getNumberOfPlayers(): int;

    /**
     * @return string
     */
    public function getStartTime(): string;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeletedAt(): ?\DateTimeInterface;
}
