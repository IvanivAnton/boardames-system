<?php

namespace App\Domain\Interfaces\Services;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

interface AuthServiceInterface
{
    public function login(PlayerEntityInterface $user);
    public function getPlayer(): PlayerEntityInterface;
}
