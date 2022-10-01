<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\EventEntityInterface;

class ResponseModel
{
    private EventEntityInterface $event;

    /**
     * @param EventEntityInterface $gameDay
     */
    public function __construct(EventEntityInterface $gameDay)
    {
        $this->event = $gameDay;
    }

    /**
     * @return EventEntityInterface
     */
    public function getEvent(): EventEntityInterface
    {
        return $this->event;
    }


}
