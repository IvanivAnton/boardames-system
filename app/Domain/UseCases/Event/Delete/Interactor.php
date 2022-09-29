<?php

namespace App\Domain\UseCases\Event\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;

class Interactor implements InputPortInterface
{
    private EventRepositoryInterface $eventRepository;
    private OutputPortInterface $output;
    private EventFactoryInterface $eventFactory;

    /**
     * @param EventRepositoryInterface $eventRepository
     * @param OutputPortInterface $output
     * @param EventFactoryInterface $eventFactory
     */
    public function __construct(EventRepositoryInterface $eventRepository, OutputPortInterface $output, EventFactoryInterface $eventFactory)
    {
        $this->eventRepository = $eventRepository;
        $this->output = $output;
        $this->eventFactory = $eventFactory;
    }


    public function delete(RequestModel $model): ViewModelInterface
    {
        $event = $this->eventRepository->get($model->getId());

        if (empty($event)) {
            return $this->output->noSuchEvent(new ResponseModel($this->eventFactory->make(['id' => $model->getId()])));
        }

        if (!$this->eventRepository->delete($event->getId())) {
            return $this->output->deletionFailed(new ResponseModel($event));
        }

        return $this->output->successfullyDeleted(new ResponseModel($event));
    }
}
