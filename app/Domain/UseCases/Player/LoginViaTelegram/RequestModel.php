<?php

namespace App\Domain\UseCases\Player\LoginViaTelegram;

class RequestModel
{
    private string $hash;
    private string $telegramId;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $photoUrl;
    private \DateTimeInterface $authDate;

    public function __construct(array $params)
    {
        $this->hash = $params['hash'];
        $this->telegramId = $params['id'];
        $this->firstName = $params['first_name'] ?? null;
        $this->lastName = $params['last_name'] ?? null;
        $this->username = $params['username'] ?? null;
        $this->authDate = $params['auth_date'];
        $this->photoUrl = $params['photo_url'] ?? null;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAuthDate(): \DateTimeInterface
    {
        return $this->authDate;
    }

    /**
     * @return string
     */
    public function getTelegramId(): string
    {
        return $this->telegramId;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }



}
