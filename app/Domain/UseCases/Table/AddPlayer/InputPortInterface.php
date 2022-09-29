<?php

namespace App\Domain\UseCases\Table\AddPlayer;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function addPlayer(RequestModel $model): ViewModelInterface;
}
