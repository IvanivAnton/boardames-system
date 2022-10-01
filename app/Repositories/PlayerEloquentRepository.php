<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;
use App\Models\PlayerEntity;

class PlayerEloquentRepository implements \App\Domain\Interfaces\Repositories\PlayerRepositoryInterface
{
    public function index($request): array
    {
        return PlayerEntity::all();
    }

    public function create(PlayerEntityInterface $player): ?PlayerEntityInterface
    {
        /** @var PlayerEntity $player */
        $player = PlayerEntity::query()->create([
           'first_name' => $player->getFirstName(),
           'last_name' => $player->getLastName(),
           'username' => $player->getUsername(),
           'photo_url' => $player->getPhotoUrl(),
           'telegram_id' => $player->getTelegramId(),
        ]);
        return $player;
    }

    public function get(int $id): ?PlayerEntityInterface
    {
        /** @var PlayerEntity $player */
        $player = PlayerEntity::query()->find($id);
        return $player;
    }

    public function getByTelegramId(int $telegramId): ?PlayerEntityInterface
    {
        /** @var PlayerEntity $player */
        $player = PlayerEntity::query()->where('telegram_id', $telegramId)->first();
        return $player;
    }

    public function update(int $id, array $values): bool
    {
        return PlayerEntity::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return PlayerEntity::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return PlayerEntity::query()->where('id', $id)->exists();
    }
}
