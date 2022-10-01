<?php

namespace App\Domain\Interfaces\Entities;

interface EventEntityInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface;

    /**
     * @return string
     */
    public function getGameDefaultStartTime(): string;

    /**
     * @return int
     */
    public function getPlaceId(): int;

    /**
     * @return int
     */
    public function getNumberOfTables(): int;

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface;

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt(): \DateTimeInterface;

}
