<?php

namespace App\Domain\UseCases\Table\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\TableServiceInterface;

class Interactor implements InputPortInterface
{
    private TableRepositoryInterface $tableRepository;
    private TableFactoryInterface $factory;
    private OutputPortInterface $output;
    private TableServiceInterface $tableService;

    /**
     * @param TableRepositoryInterface $tableRepository
     * @param OutputPortInterface $output
     * @param TableFactoryInterface $factory
     * @param TableServiceInterface $tableService
     */
    public function __construct(
        TableRepositoryInterface $tableRepository,
        OutputPortInterface      $output,
        TableFactoryInterface      $factory,
        TableServiceInterface      $tableService
    )
    {
        $this->tableRepository = $tableRepository;
        $this->output = $output;
        $this->factory = $factory;
        $this->tableService = $tableService;
    }

    public function updateTable(RequestModel $requestModel): ViewModelInterface
    {
        $values = [
            'id' => $requestModel->getId(),
            'game_id' => $requestModel->getGameId(),
            'is_game_with_dlc' => $requestModel->isGameWithDLC(),
            'is_owns_a_box' => $requestModel->isOwnsABox(),
            'number_of_players' => $requestModel->getNumberOfPlayers(),
            'start_time' => $requestModel->getStartTime(),
        ];
        if(!$this->tableService->canCurrentPlayerEditTable($requestModel->getId())) {
            return $this->output->updateNotAllowed(new ResponseModel($this->factory->make($values)));
        }


        if(!$this->tableRepository->update($requestModel->getId(), $values)) {
            $table = $this->tableRepository->get($requestModel->getId());
            return $this->output->tableNotUpdated(new ResponseModel($table));
        }

        $table = $this->tableRepository->get($requestModel->getId());
        return $this->output->tableUpdated(new ResponseModel($table));
    }
}
