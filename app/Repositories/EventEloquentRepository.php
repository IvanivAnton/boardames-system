<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\EventInterface;
use App\Models\Event;
use App\Models\Table;

class EventEloquentRepository implements \App\Domain\Interfaces\Repositories\EventRepositoryInterface
{
    public function numberOfTables(int $id): int
    {
        return Table::query()->where('event_id', $id)->count();
    }

    public function index($request): array
    {
        return Table::all();
    }

    public function create(EventInterface $event): ?EventInterface
    {
        /** @var Event $event */
        $event = Event::query()->create([
            'date' => $event->getDate(),
            'start_time' => $event->getDefaultGameStartTime(),
            'place_id' => $event->getPlaceId(),
        ]);
        return $event;
    }

    public function get(int $id): ?EventInterface
    {
        /** @var Event $event */
        $event = Event::query()->find($id);
        return $event;
    }

    public function update(int $id, array $values): bool
    {
        return Event::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return Event::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return Event::query()->where('id', $id)->exists();
    }

    public function getByDateAndPlace(string $startTime, int $placeId): ?EventInterface
    {
        /** @var Event $event */
        $event = Event::query()->where([
            'start_time' => $startTime,
            'place_id' => $placeId,
        ])->first();

        return $event;
    }
}
