<?php

namespace App\Domain\UseCases\Event\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyDeleted(ResponseModel $model): ViewModelInterface;
    public function deletionFailed(ResponseModel $model): ViewModelInterface;
    public function noSuchEvent(ResponseModel $model): ViewModelInterface;
}
