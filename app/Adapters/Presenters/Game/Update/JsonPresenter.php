<?php

namespace App\Adapters\Presenters\Game\Update;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Game\Update\OutputPortInterface;
use App\Domain\UseCases\Game\Update\ResponseModel;
use App\Http\Admin\Resources\Game\Update\NameNotUniqueResource;
use App\Http\Admin\Resources\Game\Update\SuccessfullyUpdatedResource;
use App\Http\Admin\Resources\Game\Update\UpdateFailedResource;

class JsonPresenter implements OutputPortInterface
{
    public function successfullyUpdated(ResponseModel $responseModel): ViewModelInterface
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

    public function updateFailed(ResponseModel $responseModel): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new UpdateFailedResource($responseModel->getGame())
        );
    }
}
