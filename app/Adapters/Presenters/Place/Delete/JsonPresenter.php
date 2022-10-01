<?php

namespace App\Adapters\Presenters\Place\Delete;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Place\Delete\OutputPortInterface;
use App\Domain\UseCases\Place\Delete\ResponseModel;
use App\Http\Admin\Resources\Place\Delete\DeletionFailedResource;
use App\Http\Admin\Resources\Place\Delete\NoSuchPlaceResource;
use App\Http\Admin\Resources\Place\Delete\SuccessfullyDeletedResource;

class JsonPresenter implements OutputPortInterface
{
    public function successfullyDeleted(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyDeletedResource($responseModel->getPlace())
        );
    }

    public function deletionFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new DeletionFailedResource($responseModel->getPlace())
        );
    }

    public function noSuchPlace(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NoSuchPlaceResource($responseModel->getPlace())
        );
    }
}
