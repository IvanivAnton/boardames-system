<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\PlaceInterface;

interface PlaceRepositoryInterface
{
    public function index($request): array;

    public function create(PlaceInterface $place): ?PlaceInterface;

    public function get(int $id): ?PlaceInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByName(string $name): ?PlaceInterface;

}
