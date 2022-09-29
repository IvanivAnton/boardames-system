<?php

namespace App\Domain\UseCases\Event\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;

class Interactor implements InputPortInterface
{
    private EventRepositoryInterface $eventRepository;
    private OutputPortInterface $outputPort;
    private EventFactoryInterface $eventFactory;

    /**
     * @param EventRepositoryInterface $eventRepository
     * @param OutputPortInterface $outputPort
     * @param EventFactoryInterface $eventFactory
     */
    public function __construct(EventRepositoryInterface $eventRepository, OutputPortInterface $outputPort, EventFactoryInterface $eventFactory)
    {
        $this->eventRepository = $eventRepository;
        $this->outputPort = $outputPort;
        $this->eventFactory = $eventFactory;
    }


    public function delete(RequestModel $model): ViewModelInterface
    {
        $event = $this->eventRepository->get($model->getId());

        if (empty($event)) {
            return $this->outputPort->noSuchEvent(new ResponseModel($this->eventFactory->make(['id' => $model->getId()])));
        }

        if (!$this->eventRepository->delete($event->getId())) {
            return $this->outputPort->deletionFailed(new ResponseModel($event));
        }

        return $this->outputPort->successfullyDeleted(new ResponseModel($event));
    }
}
