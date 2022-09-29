<?php

namespace App\Domain\UseCases\Event\Add;

class RequestModel
{
    private \DateTimeInterface $date;
    private string $defaultGameStartTime;
    private string $placeId;

    /**
     * @param \DateTimeInterface $date
     * @param string $defaultGameStartTime
     * @param string $placeId
     */
    public function __construct(\DateTimeInterface $date, string $defaultGameStartTime, string $placeId)
    {
        $this->date = $date;
        $this->defaultGameStartTime = $defaultGameStartTime;
        $this->placeId = $placeId;
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
