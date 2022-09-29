<?php

namespace App\Adapters\Presenters\Table\Delete;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Delete\ResponseModel;
use App\Http\Player\Resources\Table\Delete\DeleteNotAllowed;
use App\Http\Player\Resources\Table\Delete\TableDeleteResource;
use App\Http\Player\Resources\Table\Delete\TableDoesNotExistsResource;
use App\Http\Player\Resources\Table\Delete\TableNotDeletedResource;

class JsonPresenter implements \App\Domain\UseCases\Table\Delete\OutputPortInterface
{

    public function tableDeleted(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableDeleteResource($model->getId())
        );
    }

    public function tableNotDeleted(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableNotDeletedResource($model->getId())
        );
    }

    public function tableDoesNotExists(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableDoesNotExistsResource($model->getId())
        );
    }

    public function deleteNotAllowed(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new DeleteNotAllowed($model->getId())
        );
    }
}
