<?php

namespace App\Adapters\Presenters\Event\Delete;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Event\Delete\ResponseModel;
use App\Http\Admin\Resources\Event\Delete\DeletionFailedResource;
use App\Http\Admin\Resources\Event\Delete\NoSuchEventResource;
use App\Http\Admin\Resources\Event\Delete\SuccessfullyDeletedResource;

class JsonPresenter implements \App\Domain\UseCases\Event\Delete\OutputPortInterface
{

    public function successfullyDeleted(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new SuccessfullyDeletedResource($model->getEvent())
        );
    }

    public function deletionFailed(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new DeletionFailedResource($model->getEvent())
        );
    }

    public function noSuchEvent(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NoSuchEventResource($model->getEvent())
        );
    }
}
