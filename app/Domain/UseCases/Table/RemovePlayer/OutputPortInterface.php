<?php

namespace App\Domain\UseCases\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function playerRemoved(ResponseModel $model): ViewModelInterface;
    public function playerNotRemoved(ResponseModel $model): ViewModelInterface;
    public function tableDoNotExist(ResponseModel $model): ViewModelInterface;
    public function playerDoNotExist(ResponseModel $model): ViewModelInterface;
}
