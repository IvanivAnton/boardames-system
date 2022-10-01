<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;

interface PlaceRepositoryInterface
{
    public function index($request): array;

    public function create(PlaceEntityInterface $place): ?PlaceEntityInterface;

    public function get(int $id): ?PlaceEntityInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByName(string $name): ?PlaceEntityInterface;

}
