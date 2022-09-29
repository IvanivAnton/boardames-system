<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\GameInterface;

interface GameRepositoryInterface
{
    public function index($request): array;

    public function create(GameInterface $game): ?GameInterface;

    public function get(int $id): ?GameInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByName(string $name): ?GameInterface;

}
