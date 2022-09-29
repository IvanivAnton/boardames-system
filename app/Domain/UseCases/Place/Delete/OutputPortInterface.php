<?php

namespace App\Domain\UseCases\Place\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyDeleted(ResponseModel $responseModel): ViewModelInterface;
    public function deletionFailed(ResponseModel $responseModel): ViewModelInterface;
    public function noSuchPlace(ResponseModel $responseModel): ViewModelInterface;
}
