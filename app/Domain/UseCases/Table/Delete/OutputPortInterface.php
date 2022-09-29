<?php

namespace App\Domain\UseCases\Table\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function tableDeleted(ResponseModel $model): ViewModelInterface;
    public function tableNotDeleted(ResponseModel $model): ViewModelInterface;
    public function tableDoesNotExists(ResponseModel $model): ViewModelInterface;
    public function deleteNotAllowed(ResponseModel $model): ViewModelInterface;
}
