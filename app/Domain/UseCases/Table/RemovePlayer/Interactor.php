<?php

namespace App\Domain\UseCases\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\PlayerFactoryInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Domain\Interfaces\Repositories\PlayerRepositoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\AuthServiceInterface;

class Interactor implements InputPortInterface
{
    private TableRepositoryInterface $tableRepository;
    private PlayerRepositoryInterface $playerRepository;
    private OutputPortInterface $output;
    private PlayerFactoryInterface $playerFactory;
    private TableFactoryInterface $tableFactory;
    private AuthServiceInterface $authService;

    /**
     * @param TableRepositoryInterface $tableRepository
     * @param PlayerRepositoryInterface $playerRepository
     * @param OutputPortInterface $output
     * @param PlayerFactoryInterface $playerFactory
     * @param AuthServiceInterface $authService
     * @param TableFactoryInterface $tableFactory
     */
    public function __construct(
        TableRepositoryInterface $tableRepository,
        PlayerRepositoryInterface $playerRepository,
        OutputPortInterface $output,
        PlayerFactoryInterface $playerFactory,
        AuthServiceInterface $authService,
        TableFactoryInterface $tableFactory
    )
    {
        $this->tableRepository = $tableRepository;
        $this->playerRepository = $playerRepository;
        $this->output = $output;
        $this->playerFactory = $playerFactory;
        $this->tableFactory = $tableFactory;
        $this->authService = $authService;
    }


    public function removePlayer(RequestModel $model): ViewModelInterface
    {
        $playerId = $this->authService->getPlayer()->getId();
        if(!$this->playerRepository->exists($playerId)) {
            return $this->output->playerDoNotExist(
                new ResponseModel(null, $this->playerFactory->make(['id' => $playerId]))
            );
        }

        $player = $this->playerRepository->get($playerId);

        $tableId = $model->getTableId();
        if(!$this->tableRepository->exists($tableId)) {
            return $this->output->tableDoNotExist(
                new ResponseModel($this->tableFactory->make(['id' => $tableId]), $player)
            );
        }

        $table = $this->tableRepository->get($tableId);
        $responseModel = new ResponseModel($table, $player);

        if(!$this->tableRepository->addPlayer($tableId, $playerId)) {
            return $this->output->playerNotRemoved($responseModel);
        }

        return $this->output->playerRemoved($responseModel);
    }
}
