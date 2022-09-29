<?php

namespace App\Domain\UseCases\Place\Add;

class RequestModel
{
    private int $id;
    private string $name;
    private ?string $address;
    private ?float $latitude;
    private ?float $longitude;
    private int $numberOfTables;

    /**
     * @param int $id
     * @param string $name
     * @param string|null $address
     * @param float|null $latitude
     * @param float|null $longitude
     * @param int $numberOfTables
     */
    public function __construct(int $id, string $name, ?string $address, ?float $latitude, ?float $longitude, int $numberOfTables)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->numberOfTables = $numberOfTables;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @return int
     */
    public function getNumberOfTables(): int
    {
        return $this->numberOfTables;
    }


}
