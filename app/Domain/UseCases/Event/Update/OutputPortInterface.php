<?php

namespace App\Domain\UseCases\Event\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyUpdated(ResponseModel $model): ViewModelInterface;
    public function eventIntersection(ResponseModel $model): ViewModelInterface;
    public function updateFailed(ResponseModel $model): ViewModelInterface;
}
