<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;

class Interactor implements InputPortInterface
{
    private EventRepositoryInterface $eventRepository;
    private EventFactoryInterface $eventFactory;
    private OutputPortInterface $output;

    /**
     * @param EventRepositoryInterface $eventRepository
     * @param EventFactoryInterface $eventFactory
     * @param OutputPortInterface $output
     */
    public function __construct(EventRepositoryInterface $eventRepository, EventFactoryInterface $eventFactory, OutputPortInterface $output)
    {
        $this->eventRepository = $eventRepository;
        $this->eventFactory = $eventFactory;
        $this->output = $output;
    }


    public function add(RequestModel $requestModel): ViewModelInterface
    {
        $event = $this->eventFactory->make([
           'date' => $requestModel->getDate(),
           'start_time' => $requestModel->getDefaultGameStartTime(),
           'place_id' => $requestModel->getPlaceId(),
        ]);


        if(!empty($this->eventRepository->getByDateAndPlace($event->getDate(), $event->getPlaceId()))) {
            return $this->output->eventIntersection(new ResponseModel($event));
        }

        $event = $this->eventRepository->create($event);

        return $this->output->successfullyAdded(new ResponseModel($event));
    }
}
