<?php

namespace App\Adapters\Presenters\Table\AddPlayer;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\AddPlayer\OutputPortInterface;
use App\Domain\UseCases\Table\AddPlayer\ResponseModel;
use App\Http\Player\Resources\Table\AddPlayer\NoEmptySpotsResource;
use App\Http\Player\Resources\Table\AddPlayer\PlayerAddedResource;
use App\Http\Player\Resources\Table\AddPlayer\PlayerDoesNotExists;
use App\Http\Player\Resources\Table\AddPlayer\PlayerNotAdded;
use App\Http\Player\Resources\Table\AddPlayer\TableDoesNotExists;

class JsonPresenter implements OutputPortInterface
{

    public function playerAdded(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerAddedResource($model->getPlayer(), $model->getTable())
        );
    }

    public function playerNotAdded(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerNotAdded($model)
        );
    }

    public function thereIsNoEmptySpots(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new NoEmptySpotsResource($model)
        );
    }

    public function tableDoNotExist(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableDoesNotExists($model)
        );
    }

    public function playerDoNotExist(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerDoesNotExists($model)
        );
    }
}
