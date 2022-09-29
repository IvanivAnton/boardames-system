<?php

namespace App\Domain\UseCases\Table\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function updateTable(RequestModel $requestModel): ViewModelInterface;
}
