<?php

namespace App\Domain\UseCases\Event\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function delete(RequestModel $model): ViewModelInterface;
}
