<?php

namespace App\Adapters\Presenters\Table\Update;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Update\OutputPortInterface;
use App\Domain\UseCases\Table\Update\ResponseModel;
use App\Http\Player\Resources\Table\Update\TableNotUpdated;
use App\Http\Player\Resources\Table\Update\TableUpdateResource;
use App\Http\Player\Resources\Table\Update\UpdateNotAllowed;

class JsonPresenter implements OutputPortInterface
{

    public function tableNotUpdated(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableNotUpdated($model)
        );
    }

    public function tableUpdated(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableUpdateResource($model->getTable())
        );
    }

    public function updateNotAllowed(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new UpdateNotAllowed($model->getTable())
        );
    }
}
