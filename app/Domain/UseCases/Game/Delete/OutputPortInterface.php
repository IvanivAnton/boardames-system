<?php

namespace App\Domain\UseCases\Game\Delete;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyDeleted(ResponseModel $responseModel): ViewModelInterface;
    public function deletionFailed(ResponseModel $responseModel): ViewModelInterface;
    public function noSuchGame(ResponseModel $responseModel): ViewModelInterface;
}
