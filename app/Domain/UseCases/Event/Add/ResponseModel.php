<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\EventInterface;

class ResponseModel
{
    private EventInterface $event;

    /**
     * @param EventInterface $gameDay
     */
    public function __construct(EventInterface $gameDay)
    {
        $this->event = $gameDay;
    }

    /**
     * @return EventInterface
     */
    public function getEvent(): EventInterface
    {
        return $this->event;
    }


}
