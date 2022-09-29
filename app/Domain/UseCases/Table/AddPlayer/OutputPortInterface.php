<?php

namespace App\Domain\UseCases\Table\AddPlayer;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function playerAdded(ResponseModel $model): ViewModelInterface;
    public function playerNotAdded(ResponseModel $model): ViewModelInterface;
    public function thereIsNoEmptySpots(ResponseModel $model): ViewModelInterface;
    public function tableDoNotExist(ResponseModel $model): ViewModelInterface;
    public function playerDoNotExist(ResponseModel $model): ViewModelInterface;
}
