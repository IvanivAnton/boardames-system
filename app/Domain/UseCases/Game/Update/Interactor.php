<?php

namespace App\Domain\UseCases\Game\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
use App\Domain\Interfaces\Repositories\GameRepositoryInterface;

class Interactor implements InputPortInterface
{
    private GameRepositoryInterface $repository;
    private OutputPortInterface $outputPort;
    private GameFactoryInterface $factory;

    /**
     * @param GameRepositoryInterface $repository
     * @param OutputPortInterface $outputPort
     * @param GameFactoryInterface $factory
     */
    public function __construct(GameRepositoryInterface $repository, OutputPortInterface $outputPort, GameFactoryInterface $factory)
    {
        $this->repository = $repository;
        $this->outputPort = $outputPort;
        $this->factory = $factory;
    }


    public function update(RequestModel $requestModel): ViewModelInterface
    {
        $valueToUpdate = [
            'name' => $requestModel->getName(),
            'number_of_players' => $requestModel->getNumberOfPlayers(),
        ];
        $game = $this->factory->make(array_merge(['id' => $requestModel->getId()], $valueToUpdate));


        if (!empty($this->repository->getByName($game->getName()))) {
            return $this->outputPort->nameNotUnique(new ResponseModel($game));
        }

        if (!$this->repository->update($game->getId(), $valueToUpdate)) {
            return $this->outputPort->updateFailed(new ResponseModel($game));
        }

        return $this->outputPort->successfullyUpdated(new ResponseModel($game));
    }
}
