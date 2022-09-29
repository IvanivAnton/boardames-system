<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\PlayerInterface;
use App\Models\Player;

class PlayerEloquentRepository implements \App\Domain\Interfaces\Repositories\PlayerRepositoryInterface
{
    public function index($request): array
    {
        return Player::all();
    }

    public function create(PlayerInterface $player): ?PlayerInterface
    {
        /** @var Player $player */
        $player = Player::query()->create([
           'first_name' => $player->getFirstName(),
           'last_name' => $player->getLastName(),
           'username' => $player->getUsername(),
           'photo_url' => $player->getPhotoUrl(),
           'telegram_id' => $player->getTelegramId(),
        ]);
        return $player;
    }

    public function get(int $id): ?PlayerInterface
    {
        /** @var Player $player */
        $player = Player::query()->find($id);
        return $player;
    }

    public function getByTelegramId(int $telegramId): ?PlayerInterface
    {
        /** @var Player $player */
        $player = Player::query()->where('telegram_id', $telegramId)->first();
        return $player;
    }

    public function update(int $id, array $values): bool
    {
        return Player::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return Player::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return Player::query()->where('id', $id)->exists();
    }
}
