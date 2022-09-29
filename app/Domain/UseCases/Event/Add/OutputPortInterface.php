<?php

namespace App\Domain\UseCases\Event\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface;
    public function eventIntersection(ResponseModel $responseModel): ViewModelInterface;
}
