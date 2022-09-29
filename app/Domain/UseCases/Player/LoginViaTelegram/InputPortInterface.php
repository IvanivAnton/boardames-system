<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

use App\Domain\Interfaces\Entities\ViewModelInterface;

interface InputPortInterface
{
    public function login(RequestModel $model): ViewModelInterface;
}
