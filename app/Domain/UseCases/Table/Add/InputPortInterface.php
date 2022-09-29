<?php

namespace App\Domain\UseCases\Table\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function addTable(RequestModel $requestModel): ViewModelInterface;
}
