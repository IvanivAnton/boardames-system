<?php

namespace App\Adapters\Presenters\Event\Update;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Event\Update\ResponseModel;
use App\Http\Admin\Resources\Event\Update\EventIntersectionResource;
use App\Http\Admin\Resources\Event\Update\SuccessfullyUpdatedResource;
use App\Http\Admin\Resources\Event\Update\UpdateFailedResource;

class JsonPresenter implements \App\Domain\UseCases\Event\Update\OutputPortInterface
{

    public function eventIntersection(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new EventIntersectionResource($model->getEvent())
        );
    }

    public function successfullyUpdated(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyUpdatedResource($model->getEvent())
        );
    }

    public function updateFailed(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new UpdateFailedResource($model->getEvent())
        );
    }
}
