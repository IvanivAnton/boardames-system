<?php

namespace App\Adapters\Presenters\Game\Add;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Game\Add\ResponseModel;
use App\Http\Player\Resources\Game\Add\NameNotUniqueResource;
use App\Http\Player\Resources\Game\Add\SuccessfullyAddedResource;

class JsonPresenter implements \App\Domain\UseCases\Game\Add\OutputPortInterface
{

    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyAddedResource($responseModel->getGame())
        );
    }

    public function nameNotUnique(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NameNotUniqueResource($responseModel->getGame())
        );
    }
}
