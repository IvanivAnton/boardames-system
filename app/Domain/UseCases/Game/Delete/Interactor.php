<?php

namespace App\Domain\UseCases\Game\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;
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


    public function delete(RequestModel $model): ViewModelInterface
    {
        $event = $this->repository->get($model->getId());

        if (empty($event)) {
            return $this->outputPort->noSuchGame(new ResponseModel($this->factory->make(['id' => $model->getId()])));
        }

        if (!$this->repository->delete($event->getId())) {
            return $this->outputPort->deletionFailed(new ResponseModel($event));
        }

        return $this->outputPort->successfullyDeleted(new ResponseModel($event));
    }
}
