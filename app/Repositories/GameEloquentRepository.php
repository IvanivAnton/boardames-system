<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\GameInterface;
use App\Models\Game;

class GameEloquentRepository implements \App\Domain\Interfaces\Repositories\GameRepositoryInterface
{
    public function index($request): array
    {
        return Game::all();
    }

    public function create(GameInterface $game): ?GameInterface
    {
        /** @var Game $game */
        $game = Game::query()->create([
            'name' => $game->getName(),
            'number_of_players' => $game->getNumberOfPlayers(),
        ]);
        return $game;
    }

    public function get(int $id): ?GameInterface
    {
        /** @var Game $game */
        $game = Game::query()->find($id);
        return $game;
    }

    public function update(int $id, array $values): bool
    {
        return Game::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return Game::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return Game::query()->where('id', $id)->exists();
    }

    public function getByName(string $name): ?GameInterface
    {
        /** @var Game $game */
        $game = Game::query()->where('name', $name)->first();
        return $game;
    }
}
