<?php

namespace App\Domain\Interfaces\Entities;

interface TablePlayerInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getTableId(): int;

    /**
     * @return int
     */
    public function getPlayerId(): int;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt(): \DateTimeInterface;
}
