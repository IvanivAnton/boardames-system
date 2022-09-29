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
    private OutputPortInterface $output;
    private GameFactoryInterface $factory;

    /**
     * @param GameRepositoryInterface $repository
     * @param OutputPortInterface $output
     * @param GameFactoryInterface $factory
     */
    public function __construct(GameRepositoryInterface $repository, OutputPortInterface $output, GameFactoryInterface $factory)
    {
        $this->repository = $repository;
        $this->output = $output;
        $this->factory = $factory;
    }


    public function delete(RequestModel $model): ViewModelInterface
    {
        $event = $this->repository->get($model->getId());

        if (empty($event)) {
            return $this->output->noSuchGame(new ResponseModel($this->factory->make(['id' => $model->getId()])));
        }

        if (!$this->repository->delete($event->getId())) {
            return $this->output->deletionFailed(new ResponseModel($event));
        }

        return $this->output->successfullyDeleted(new ResponseModel($event));
    }
}
