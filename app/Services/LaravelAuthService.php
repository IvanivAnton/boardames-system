<?php

namespace App\Services;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use App\Models\PlayerEntity;
use Illuminate\Support\Facades\Auth;

class LaravelAuthService implements \App\Domain\Interfaces\Services\AuthServiceInterface
{
    public function login(PlayerEntityInterface $user)
    {
        Auth::login($user);
    }

    public function getPlayer(): PlayerEntityInterface
    {
        /** @var PlayerEntity $user */
        $user = Auth::user();
        return $user;
    }
}
