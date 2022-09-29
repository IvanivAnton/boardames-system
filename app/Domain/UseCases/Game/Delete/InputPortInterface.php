<?php

namespace App\Domain\UseCases\Game\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function delete(RequestModel $model): ViewModelInterface;
}
