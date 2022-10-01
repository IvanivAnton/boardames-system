<?php

namespace App\Adapters\Presenters\Place\Add;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Place\Add\OutputPortInterface;
use App\Domain\UseCases\Place\Add\ResponseModel;
use App\Http\Admin\Resources\Place\Add\CreationFailedResource;
use App\Http\Admin\Resources\Place\Add\NotUniqueNameResource;
use App\Http\Admin\Resources\Place\Add\SuccessfullyAddedResource;

class JsonPresenter implements OutputPortInterface
{
    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyAddedResource($responseModel->getPlace())
        );
    }

    public function notUniqueName(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NotUniqueNameResource($responseModel->getPlace())
        );
    }

    public function creationFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new CreationFailedResource($responseModel->getPlace())
        );
    }
}
