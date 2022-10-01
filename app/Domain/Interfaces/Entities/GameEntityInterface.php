<?php

namespace App\Domain\Interfaces\Entities;

interface GameEntityInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getNumberOfPlayers(): int;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt(): \DateTimeInterface;
}
