<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\TableEntityInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Models\TableEntity;
use App\Models\TablePlayer;
use Facade\Ignition\Tabs\Tab;

class TableEloquentRepository implements TableRepositoryInterface
{

    public function index($request): array
    {
        return TableEntity::all()->toArray();
    }

    public function create(TableEntityInterface $table): TableEntityInterface
    {
        /** @var TableEntity $table */
        $table = TableEntity::query()->create([
            'game_id' => $table->getGameId(),
            'event_id' => $table->getEventId(),
            'is_game_with_dlc' => $table->isGameWithDLC(),
            'is_owns_a_box' => $table->isOwnsABox(),
            'number_of_players' => $table->getNumberOfPlayers(),
            'start_time' => $table->getStartTime(),
            'owner_id' => $table->getOwnerId(),
        ]);
        return $table;
    }

    public function get(int $id): ?TableEntityInterface
    {
        /** @var TableEntity $table */
        $table = TableEntity::query()->find($id);
        return $table;
    }

    public function update(int $id, array $values): bool
    {
        return TableEntity::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return TableEntity::query()->find($id)->delete();
    }

    public function addPlayer(int $tableId, int $playerId): bool
    {
        return !empty(TablePlayer::query()->firstOrCreate([
            'table_id' => $tableId,
            'player_id' => $playerId,
        ]));
    }

    public function exists(int $id): bool
    {
        return TableEntity::query()->where('id', $id)->exists();
    }

    public function currentNumberOfPlayers(int $id): int
    {
        return TablePlayer::query()->where('table_id', $id)->count();
    }

    public function removePlayer(int $tableId, int $playerId): bool
    {
        return TablePlayer::query()->where([
            'table_id' => $tableId,
            'player_id' => $playerId,
        ])->delete();
    }
}
