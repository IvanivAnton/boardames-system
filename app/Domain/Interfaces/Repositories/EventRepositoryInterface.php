<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\EventInterface;

interface EventRepositoryInterface
{
    public function numberOfTables(int $id): int;

    public function index($request): array;

    public function create(EventInterface $event): ?EventInterface;

    public function get(int $id): ?EventInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByDateAndPlace(string $startTime, int $placeId): ?EventInterface;
}
