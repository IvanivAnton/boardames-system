<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\EventEntityInterface;
use App\Models\EventEntity;
use App\Models\TableEntity;

class EventEloquentRepository implements \App\Domain\Interfaces\Repositories\EventRepositoryInterface
{
    public function numberOfTables(int $id): int
    {
        return TableEntity::query()->where('event_id', $id)->count();
    }

    public function index($request): array
    {
        return TableEntity::all();
    }

    public function create(EventEntityInterface $event): ?EventEntityInterface
    {
        /** @var EventEntity $event */
        $event = EventEntity::query()->create([
            'date' => $event->getDate(),
            'start_time' => $event->getGameDefaultStartTime(),
            'place_id' => $event->getPlaceId(),
        ]);
        return $event;
    }

    public function get(int $id): ?EventEntityInterface
    {
        /** @var EventEntity $event */
        $event = EventEntity::query()->find($id);
        return $event;
    }

    public function update(int $id, array $values): bool
    {
        return EventEntity::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return EventEntity::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return EventEntity::query()->where('id', $id)->exists();
    }

    public function getByDateAndPlace(string $startTime, int $placeId): ?EventEntityInterface
    {
        /** @var EventEntity $event */
        $event = EventEntity::query()->where([
            'start_time' => $startTime,
            'place_id' => $placeId,
        ])->first();

        return $event;
    }
}
