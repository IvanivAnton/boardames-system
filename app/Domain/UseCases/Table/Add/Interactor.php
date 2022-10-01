<?php

namespace App\Domain\UseCases\Table\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\AuthServiceInterface;
use App\Factories\TableFactory;

class Interactor implements InputPortInterface
{
    private TableFactoryInterface $factory;
    private TableRepositoryInterface $tableRepository;
    private EventRepositoryInterface $eventRepository;
    private OutputPortInterface $output;
    private AuthServiceInterface $authService;

    /**
     * @param TableFactoryInterface $factory
     * @param TableRepositoryInterface $tableRepository
     * @param EventRepositoryInterface $eventRepository
     * @param AuthServiceInterface $authService
     * @param OutputPortInterface $output
     */
    public function __construct(
        TableFactoryInterface    $factory,
        TableRepositoryInterface $tableRepository,
        EventRepositoryInterface $eventRepository,
        AuthServiceInterface $authService,
        OutputPortInterface      $output)
    {
        $this->factory = $factory;
        $this->tableRepository = $tableRepository;
        $this->eventRepository = $eventRepository;
        $this->output = $output;
        $this->authService = $authService;
    }


    public function addTable(RequestModel $requestModel): ViewModelInterface
    {
        $eventId = $requestModel->getEventId();

        //TODO Remove after auth complete
//        $currentPlayerId = $this->authService->getPlayer()->getId();
        $currentPlayerId = 2;
        $table = $this->factory->make([
            'game_id' => $requestModel->getGameId(),
            'event_id' => $eventId,
            'is_game_with_dlc' => $requestModel->isGameWithDLC(),
            'is_owns_a_box' => $requestModel->isOwnsABox(),
            'number_of_players' => $requestModel->getNumberOfPlayers(),
            'start_time' => $requestModel->getStartTime(),
            'owner_id' => $currentPlayerId,
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
