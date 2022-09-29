<?php

namespace App\Domain\UseCases\Place\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function delete(RequestModel $model): ViewModelInterface;
}
