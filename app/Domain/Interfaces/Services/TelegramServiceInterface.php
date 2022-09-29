<?php

namespace App\Domain\Interfaces\Services;

use App\DTO\LoginViaTelegramDTO;
use App\Exceptions\TelegramAuthExpiredException;
use App\Exceptions\TelegramAuthFailedException;

interface TelegramServiceInterface
{
    /**
     * @param LoginViaTelegramDTO $telegramLoginData
     * @return void
     * @throws TelegramAuthExpiredException
     * @throws TelegramAuthFailedException
     */
    public function validateAuth(LoginViaTelegramDTO $telegramLoginData): void;
}
