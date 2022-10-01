<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\PlayerEntityInterface;

interface PlayerRepositoryInterface
{
    public function index($request): array;

    public function create(PlayerEntityInterface $player): ?PlayerEntityInterface;

    public function get(int $id): ?PlayerEntityInterface;
    public function getByTelegramId(int $telegramId): ?PlayerEntityInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;
}
