<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function add(RequestModel $requestModel): ViewModelInterface;
}
