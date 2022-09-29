<?php

namespace App\Domain\UseCases\Game\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
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


    public function add(RequestModel $requestModel): ViewModelInterface
    {
        $game = $this->factory->make([
            'name' => $requestModel->getName(),
            'number_of_players' => $requestModel->getNumberOfPlayers(),
        ]);


        if(!empty($this->repository->getByName($game->getName()))) {
            return $this->output->nameNotUnique(new ResponseModel($game));
        }

        $game = $this->repository->create($game);

        return $this->output->successfullyAdded(new ResponseModel($game));
    }
}
