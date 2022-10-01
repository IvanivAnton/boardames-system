<?php

namespace App\Adapters\Presenters\Event\Add;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Event\Add\ResponseModel;
use App\Http\Admin\Resources\Event\Add\EventIntersectionResource;
use App\Http\Admin\Resources\Event\Add\SuccessfullyAddedResource;

class JsonPresenter implements \App\Domain\UseCases\Event\Add\OutputPortInterface
{

    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyAddedResource($responseModel->getEvent())
        );
    }

    public function eventIntersection(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new EventIntersectionResource($responseModel->getEvent())
        );
    }
}
