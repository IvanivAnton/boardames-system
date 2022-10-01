<?php

namespace App\Http\Admin\Resources\Event\Update;

use App\Domain\Interfaces\Entities\EventEntityInterface;
use App\Domain\Interfaces\Entities\PlaceEntityInterface;

class SuccessfullyUpdatedResource extends \Illuminate\Http\Resources\Json\JsonResource
{
    private EventEntityInterface $event;

    /**
     * @param EventEntityInterface $event
     */
    public function __construct(EventEntityInterface $event)
    {
        $this->event = $event;
    }

    public function toArray($request): array
    {
        return [
          'id' => $this->event->getId(),
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode(200);
    }


}
