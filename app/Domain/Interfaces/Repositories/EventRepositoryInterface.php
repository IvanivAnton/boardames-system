<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\EventEntityInterface;

interface EventRepositoryInterface
{
    public function numberOfTables(int $id): int;

    public function index($request): array;

    public function create(EventEntityInterface $event): ?EventEntityInterface;

    public function get(int $id): ?EventEntityInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByDateAndPlace(string $startTime, int $placeId): ?EventEntityInterface;
}
