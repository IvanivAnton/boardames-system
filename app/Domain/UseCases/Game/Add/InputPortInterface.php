<?php

namespace App\Domain\UseCases\Game\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function add(RequestModel $requestModel): ViewModelInterface;
}
