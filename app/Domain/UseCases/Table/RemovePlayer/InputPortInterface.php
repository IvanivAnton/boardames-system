<?php

namespace App\Domain\UseCases\Table\RemovePlayer;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function removePlayer(RequestModel $model): ViewModelInterface;
}
