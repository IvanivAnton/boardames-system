<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Interfaces\Entities\PlayerInterface;

interface AuthServiceInterface
{
    public function login(PlayerInterface $user);
    public function getPlayer(): PlayerInterface;
}
