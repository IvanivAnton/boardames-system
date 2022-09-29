<?php

namespace App\Domain\UseCases\Event\Update;

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


    public function update(RequestModel $model): ViewModelInterface
    {
        $valuesToUpdate = [
            'date' => $model->getDate(),
            'start_time' => $model->getDefaultGameStartTime(),
            'place_id' => $model->getPlaceId(),
        ];
        $eventData = array_merge(['id' => $model->getId()], $valuesToUpdate);
        $event = $this->eventFactory->make($eventData);

        if (!empty($this->eventRepository->getByDateAndPlace($event->getDate(), $event->getPlaceId()))) {
            return $this->output->eventIntersection(new ResponseModel($event));
        }

        if(!$this->eventRepository->update($event->getId(), $valuesToUpdate)) {
            return $this->output->updateFailed(new ResponseModel($event));
        }

        return $this->output->successfullyUpdated(new ResponseModel($event));
    }
}
