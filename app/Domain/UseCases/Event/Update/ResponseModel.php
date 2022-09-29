<?php

namespace App\Domain\UseCases\Event\Update;

use App\Domain\Interfaces\Entities\EventInterface;

class ResponseModel
{
    private EventInterface $event;

    /**
     * @param EventInterface $event
     */
    public function __construct(EventInterface $event)
    {
        $this->event = $event;
    }

    /**
     * @return EventInterface
     */
    public function getEvent(): EventInterface
    {
        return $this->event;
    }


}
