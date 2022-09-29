<?php

namespace App\Domain\UseCases\Place\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface;
    public function notUniqueName(ResponseModel $responseModel): ViewModelInterface;
    public function creationFailed(ResponseModel $responseModel): ViewModelInterface;
}
