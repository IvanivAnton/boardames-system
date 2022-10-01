<?php

namespace App\Adapters\Presenters\Game\Delete;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Game\Delete\OutputPortInterface;
use App\Domain\UseCases\Game\Delete\ResponseModel;
use App\Http\Admin\Resources\Game\Delete\DeletionFailedResource;
use App\Http\Admin\Resources\Game\Delete\NoSuchGameResource;
use App\Http\Admin\Resources\Game\Delete\SuccessfullyDeletedResource;

class JsonPresenter implements OutputPortInterface
{

    public function successfullyDeleted(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyDeletedResource($responseModel->getGame())
        );
    }

    public function deletionFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new DeletionFailedResource($responseModel->getGame())
        );
    }

    public function noSuchGame(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NoSuchGameResource($responseModel->getGame())
        );
    }
}
