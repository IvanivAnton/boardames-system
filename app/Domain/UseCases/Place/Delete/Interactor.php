<?php

namespace App\Domain\UseCases\Place\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\PlaceFactoryInterface;
use App\Domain\Interfaces\Repositories\PlaceRepositoryInterface;

class Interactor implements InputPortInterface
{
    private PlaceRepositoryInterface $repository;
    private PlaceFactoryInterface $factory;
    private OutputPortInterface $output;

    /**
     * @param PlaceRepositoryInterface $repository
     * @param PlaceFactoryInterface $factory
     * @param OutputPortInterface $output
     */
    public function __construct(PlaceRepositoryInterface $repository, PlaceFactoryInterface $factory, OutputPortInterface $output)
    {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->output = $output;
    }


    public function delete(RequestModel $model): ViewModelInterface
    {
        $place = $this->factory->make([
            'id' => $model->getId(),
        ]);

        if(!empty($this->repository->exists($place->getId()))) {
            return $this->output->noSuchPlace(new ResponseModel($place));
        }

        if(empty($this->repository->delete($place->getId()))) {
            return $this->output->deletionFailed(new ResponseModel($place));
        }

        return $this->output->successfullyDeleted(new ResponseModel($place));
    }
}
