<?php

namespace App\Adapters\Presenters\Table\Add;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\Add\ResponseModel;
use App\Http\Player\Resources\Table\Add\NoEmptySpotsResource;
use App\Http\Player\Resources\Table\Add\TableCreatedResource;

class JsonPresenter implements \App\Domain\UseCases\Table\Add\OutputPortInterface
{

    public function thereIsNoEmptySpots(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NoEmptySpotsResource($model)
        );
    }

    public function tableCreated(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableCreatedResource($model->getTable())
        );
    }
}
