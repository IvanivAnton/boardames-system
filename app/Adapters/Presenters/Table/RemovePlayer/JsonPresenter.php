<?php

namespace App\Adapters\Presenters\Table\RemovePlayer;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\Entities\ViewModelInterface;
use App\Domain\UseCases\Table\RemovePlayer\ResponseModel;
use App\Http\Player\Resources\Table\RemovePlayer\PlayerDoNotExists;
use App\Http\Player\Resources\Table\RemovePlayer\PlayerNotRemovedResource;
use App\Http\Player\Resources\Table\RemovePlayer\PlayerRemovedResource;
use App\Http\Player\Resources\Table\RemovePlayer\TableDoNotExists;

class JsonPresenter implements \App\Domain\UseCases\Table\RemovePlayer\OutputPortInterface
{

    public function playerRemoved(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerRemovedResource($model->getPlayer())
        );
    }

    public function playerNotRemoved(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerNotRemovedResource($model->getPlayer())
        );
    }

    public function tableDoNotExist(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new TableDoNotExists($model->getPlayer())
        );
    }

    public function playerDoNotExist(ResponseModel $model): ViewModelInterface
    {
        return new JsonResourceViewModel(
            new PlayerDoNotExists($model->getPlayer())
        );
    }
}
