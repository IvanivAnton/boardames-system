<?php

namespace App\Services;

use App\Domain\Interfaces\Services\TelegramServiceInterface;
use App\DTO\LoginViaTelegramDTO;
use App\Exceptions\TelegramAuthExpiredException;
use App\Exceptions\TelegramAuthFailedException;

class TelegramService implements TelegramServiceInterface
{
    /**
     * @inheritDoc
     */
    public function validateAuth(LoginViaTelegramDTO $telegramLoginData): void
    {
        if ((time() - $telegramLoginData->getAuthDate()->getTimestamp()) > 86400) {
            throw new TelegramAuthExpiredException('Telegram login outdated');
        }

        $check_hash = $telegramLoginData->getHash();

        $authValidationArray = [];
        foreach ($telegramLoginData->getAuthData() as $key => $value) {
            $authValidationArray[] = $key . '=' . $value;
        }
        sort($authValidationArray);
        $data_check_string = implode("\n", $authValidationArray);
        $secret_key = hash('sha256', env('TELEGRAM_BOT_TOKEN'), true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);
        if (strcmp($hash, $check_hash) !== 0) {
            throw new TelegramAuthFailedException('Data is NOT from Telegram');
        }
    }
}
