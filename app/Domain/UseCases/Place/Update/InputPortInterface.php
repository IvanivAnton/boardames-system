<?php

namespace App\Domain\UseCases\Place\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function update(RequestModel $model): ViewModelInterface;
}
