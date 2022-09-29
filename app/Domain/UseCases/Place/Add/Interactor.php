<?php

namespace App\Domain\UseCases\Place\Add;

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


    public function add(RequestModel $model): ViewModelInterface
    {
        $place = $this->factory->make([
            'name' => $model->getName(),
            'address' => $model->getAddress(),
            'latitude' => $model->getLatitude(),
            'longitude' => $model->getLongitude(),
            'number_of_table' => $model->getNumberOfTables(),
        ]);

        if(!empty($this->repository->getByName($place->getName()))) {
            return $this->output->notUniqueName(new ResponseModel($place));
        }

        $place = $this->repository->create($place);
        if(empty($place)) {
            return $this->output->creationFailed(new ResponseModel($place));
        }

        return $this->output->successfullyAdded(new ResponseModel($place));
    }
}
