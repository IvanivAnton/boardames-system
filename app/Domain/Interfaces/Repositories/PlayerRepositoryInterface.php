<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\PlayerInterface;

interface PlayerRepositoryInterface
{
    public function index($request): array;

    public function create(PlayerInterface $player): ?PlayerInterface;

    public function get(int $id): ?PlayerInterface;
    public function getByTelegramId(int $telegramId): ?PlayerInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;
}
