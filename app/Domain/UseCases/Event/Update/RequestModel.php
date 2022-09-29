<?php

namespace App\Domain\UseCases\Event\Update;

class RequestModel
{
    private int $id;
    private \DateTimeInterface $date;
    private string $defaultGameStartTime;
    private string $placeId;

    /**
     * @param int $id
     * @param \DateTimeInterface $date
     * @param string $defaultGameStartTime
     * @param string $placeId
     */
    public function __construct(int $id, \DateTimeInterface $date, string $defaultGameStartTime, string $placeId)
    {
        $this->id = $id;
        $this->date = $date;
        $this->defaultGameStartTime = $defaultGameStartTime;
        $this->placeId = $placeId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getDefaultGameStartTime(): string
    {
        return $this->defaultGameStartTime;
    }

    /**
     * @return string
     */
    public function getPlaceId(): string
    {
        return $this->placeId;
    }


}
