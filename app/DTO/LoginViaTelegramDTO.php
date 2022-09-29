<?php

namespace App\DTO;

class LoginViaTelegramDTO
{
    private string $hash;
    private array $authData;
    private \DateTimeInterface $authDate;

    /**
     * @param string $hash
     * @param array $authData
     * @param \DateTimeInterface $authDate
     */
    public function __construct(string $hash, array $authData, \DateTimeInterface $authDate)
    {
        $this->hash = $hash;
        $this->authData = $authData;
        $this->authDate = $authDate;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return array
     */
    public function getAuthData(): array
    {
        return $this->authData;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAuthDate(): \DateTimeInterface
    {
        return $this->authDate;
    }


}
