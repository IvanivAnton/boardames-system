<?php

namespace App\Domain\Interfaces\Entities;

interface PlaceInterface
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
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * @return float|null
     */
    public function getLatitude(): ?float;

    /**
     * @return float|null
     */
    public function getLongitude(): ?float;

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
