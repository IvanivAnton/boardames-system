<?php

namespace App\Domain\UseCases\Place\Update;

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


    public function update(RequestModel $model): ViewModelInterface
    {
        $valueToUpdate = [
            'name' => $model->getName(),
            'address' => $model->getAddress(),
            'latitude' => $model->getLatitude(),
            'longitude' => $model->getLongitude(),
            'number_of_table' => $model->getNumberOfTables(),
        ];

        $place = $this->factory->make(array_merge(['id' => $model->getId()], $valueToUpdate));

        if(!empty($this->repository->getByName($place->getName()))) {
            return $this->output->nameNotUnique(new ResponseModel($place));
        }

        if(empty($this->repository->update($place->getId(), $valueToUpdate))) {
            return $this->output->updateFailed(new ResponseModel($place));
        }

        return $this->output->successfullyUpdated(new ResponseModel($place));
    }
}
