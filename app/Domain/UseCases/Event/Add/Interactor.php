<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;

class Interactor implements InputPortInterface
{
    private EventRepositoryInterface $eventRepository;
    private EventFactoryInterface $eventFactory;
    private OutputPortInterface $outputPort;

    /**
     * @param EventRepositoryInterface $eventRepository
     * @param EventFactoryInterface $eventFactory
     * @param OutputPortInterface $outputPort
     */
    public function __construct(EventRepositoryInterface $eventRepository, EventFactoryInterface $eventFactory, OutputPortInterface $outputPort)
    {
        $this->eventRepository = $eventRepository;
        $this->eventFactory = $eventFactory;
        $this->outputPort = $outputPort;
    }


    public function add(RequestModel $requestModel): ViewModelInterface
    {
        $event = $this->eventFactory->make([
           'date' => $requestModel->getDate(),
           'start_time' => $requestModel->getDefaultGameStartTime(),
           'place_id' => $requestModel->getPlaceId(),
        ]);


        if(!empty($this->eventRepository->getByDateAndPlace($event->getDate(), $event->getPlaceId()))) {
            return $this->outputPort->eventIntersection(new ResponseModel($event));
        }

        $event = $this->eventRepository->create($event);

        return $this->outputPort->successfullyAdded(new ResponseModel($event));
    }
}
