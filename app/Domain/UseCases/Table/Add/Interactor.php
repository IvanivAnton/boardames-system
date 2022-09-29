<?php

namespace App\Domain\UseCases\Table\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Factories\TableFactory;

class Interactor implements InputPortInterface
{
    private TableFactory $factory;
    private TableRepositoryInterface $tableRepository;
    private EventRepositoryInterface $eventRepository;
    private OutputPortInterface $output;

    /**
     * @param TableFactoryInterface $factory
     * @param TableRepositoryInterface $tableRepository
     * @param EventRepositoryInterface $eventRepository
     * @param OutputPortInterface $output
     */
    public function __construct(
        TableFactoryInterface    $factory,
        TableRepositoryInterface $tableRepository,
        EventRepositoryInterface $eventRepository,
        OutputPortInterface      $output)
    {
        $this->factory = $factory;
        $this->tableRepository = $tableRepository;
        $this->eventRepository = $eventRepository;
        $this->output = $output;
    }


    public function addTable(RequestModel $requestModel): ViewModelInterface
    {
        $eventId = $requestModel->getEventId();

        $table = $this->factory->make([
            'gameId' => $requestModel->getGameId(),
            'eventId' => $eventId,
            'gameWithDLC' => $requestModel->isGameWithDLC(),
            'ownsABox' => $requestModel->isOwnsABox(),
            'numberOfPlayers' => $requestModel->getNumberOfPlayers(),
            'startTime' => $requestModel->getStartTime(),
        ]);

        $event = $this->eventRepository->get($eventId);
        if($this->eventRepository->numberOfTables($eventId) + 1
            > $event->getNumberOfTables()) {
            return $this->output->thereIsNoEmptySpots(new ResponseModel($table));
        }

        $table = $this->tableRepository->create($table);

        return $this->output->tableCreated(new ResponseModel($table));
    }
}
