<?php

namespace App\Domain\UseCases\Game\Add;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyAdded(ResponseModel $responseModel): ViewModelInterface;
    public function nameNotUnique(ResponseModel $responseModel): ViewModelInterface;
}
