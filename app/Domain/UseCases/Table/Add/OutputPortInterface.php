<?php

namespace App\Domain\UseCases\Table\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function thereIsNoEmptySpots(ResponseModel $model): ViewModelInterface;

    public function tableCreated(ResponseModel $model): ViewModelInterface;
}
