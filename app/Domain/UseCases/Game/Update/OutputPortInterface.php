<?php

namespace App\Domain\UseCases\Game\Update;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyUpdated(ResponseModel $responseModel): ViewModelInterface;
    public function nameNotUnique(ResponseModel $responseModel): ViewModelInterface;
    public function updateFailed(ResponseModel $responseModel): ViewModelInterface;
}
