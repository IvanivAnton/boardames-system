<?php

namespace App\Adapters\Presenters\Place\Update;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Place\Update\OutputPortInterface;
use App\Domain\UseCases\Place\Update\ResponseModel;
use App\Http\Admin\Resources\Place\Update\NotUniqueNameResource;
use App\Http\Admin\Resources\Place\Update\SuccessfullyUpdatedResource;
use App\Http\Admin\Resources\Place\Update\UpdateFailedResource;

class JsonPresenter implements OutputPortInterface
{
    public function successfullyUpdated(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyUpdatedResource($responseModel->getPlace())
        );
    }

    public function nameNotUnique(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NotUniqueNameResource($responseModel->getPlace())
        );
    }

    public function updateFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new UpdateFailedResource($responseModel->getPlace())
        );
    }
}
