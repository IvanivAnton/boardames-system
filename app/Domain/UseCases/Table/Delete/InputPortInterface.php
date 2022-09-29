<?php

namespace App\Domain\UseCases\Table\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function deleteTable(RequestModel $requestModel): ViewModelInterface;
}
