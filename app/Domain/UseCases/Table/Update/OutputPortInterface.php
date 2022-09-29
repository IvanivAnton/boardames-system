<?php

namespace App\Domain\UseCases\Table\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function tableNotUpdated(ResponseModel $model): ViewModelInterface;
    public function tableUpdated(ResponseModel $model): ViewModelInterface;
    public function updateNotAllowed(ResponseModel $model): ViewModelInterface;
}
