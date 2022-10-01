<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\GameEntityInterface;
use App\Models\GameEntity;

class GameEloquentRepository implements \App\Domain\Interfaces\Repositories\GameRepositoryInterface
{
    public function index($request): array
    {
        return GameEntity::all();
    }

    public function create(GameEntityInterface $game): ?GameEntityInterface
    {
        /** @var GameEntity $game */
        $game = GameEntity::query()->create([
            'name' => $game->getName(),
            'number_of_players' => $game->getNumberOfPlayers(),
        ]);
        return $game;
    }

    public function get(int $id): ?GameEntityInterface
    {
        /** @var GameEntity $game */
        $game = GameEntity::query()->find($id);
        return $game;
    }

    public function update(int $id, array $values): bool
    {
        return GameEntity::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return GameEntity::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return GameEntity::query()->where('id', $id)->exists();
    }

    public function getByName(string $name): ?GameEntityInterface
    {
        /** @var GameEntity $game */
        $game = GameEntity::query()->where('name', $name)->first();
        return $game;
    }
}
