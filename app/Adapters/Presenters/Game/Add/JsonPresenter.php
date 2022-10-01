<?php

namespace App\Adapters\Presenters\Game\Add;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Game\Add\ResponseModel;
use App\Http\Player\Resources\Game\Add\NameNotUniqueResource;
use App\Http\Player\Resources\Game\Add\SuccessfullyUpdatedResource;

class JsonPresenter implements \App\Domain\UseCases\Game\Add\OutputPortInterface
{

    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyUpdatedResource($responseModel->getGame())
        );
    }

    public function nameNotUnique(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NameNotUniqueResource($responseModel->getGame())
        );
    }
}
