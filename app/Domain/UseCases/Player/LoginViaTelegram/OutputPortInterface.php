<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface OutputPortInterface
{
    public function successfullyLogin(ResponseModel $responseModel): ViewModelInterface;
    public function loginExpired(ResponseModel $responseModel): ViewModelInterface;
    public function loginFailed(ResponseModel $responseModel): ViewModelInterface;
}
