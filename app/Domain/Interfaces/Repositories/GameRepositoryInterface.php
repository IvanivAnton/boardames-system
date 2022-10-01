<?php

namespace App\Domain\Interfaces\Repositories;

use App\Domain\Interfaces\Entities\GameEntityInterface;

interface GameRepositoryInterface
{
    public function index($request): array;

    public function create(GameEntityInterface $game): ?GameEntityInterface;

    public function get(int $id): ?GameEntityInterface;

    public function update(int $id, array $values): bool;

    public function delete(int $id): bool;

    public function exists(int $id): bool;

    public function getByName(string $name): ?GameEntityInterface;

}
