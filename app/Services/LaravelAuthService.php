<?php

namespace App\Services;

use App\Domain\Interfaces\Entities\PlayerInterface;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class LaravelAuthService implements \App\Domain\Interfaces\Services\AuthServiceInterface
{
    public function login(PlayerInterface $user)
    {
        Auth::login($user);
    }

    public function getPlayer(): PlayerInterface
    {
        /** @var Player $user */
        $user = Auth::user();
        return $user;
    }
}
