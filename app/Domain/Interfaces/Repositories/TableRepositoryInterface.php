<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\TableInterface;

interface TableRepositoryInterface
{
    public function index($request): array;

    public function create(TableInterface $table): TableInterface;

    public function get(int $id): ?TableInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function addPlayer(int $tableId, int $playerId): bool;
    public function removePlayer(int $tableId, int $playerId): bool;

    public function exists(int $id): bool;

    public function currentNumberOfPlayers(int $id): int;
}
