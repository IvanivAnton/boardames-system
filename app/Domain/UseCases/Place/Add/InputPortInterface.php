<?php

namespace App\Domain\UseCases\Place\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function add(RequestModel $model): ViewModelInterface;
}
