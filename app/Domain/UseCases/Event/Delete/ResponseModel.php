<?php

namespace App\Domain\UseCases\Event\Delete;

use App\Domain\Interfaces\Entities\EventEntityInterface;

class ResponseModel
{
    private EventEntityInterface $event;

    /**
     * @param EventEntityInterface $event
     */
    public function __construct(EventEntityInterface $event)
    {
        $this->event = $event;
    }

    /**
     * @return EventEntityInterface
     */
    public function getEvent(): EventEntityInterface
    {
        return $this->event;
    }


}
