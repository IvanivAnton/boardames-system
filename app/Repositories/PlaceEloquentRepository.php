<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\PlaceEntityInterface;
use App\Models\PlaceEntity;

class PlaceEloquentRepository implements \App\Domain\Interfaces\Repositories\PlaceRepositoryInterface
{
    public function index($request): array
    {
        return PlaceEntity::all();
    }

    public function create(PlaceEntityInterface $place): ?PlaceEntityInterface
    {
        /** @var ?PlaceEntity $place */
        $place = PlaceEntity::query()->create([
            'name' => $place->getName(),
            'address' => $place->getAddress(),
            'latitude' => $place->getLatitude(),
            'longitude' => $place->getLongitude(),
            'number_of_tables' => $place->getNumberOfTables(),
        ]);
        return $place;
    }

    public function get(int $id): ?PlaceEntityInterface
    {
        /** @var ?PlaceEntity $place */
        $place = PlaceEntity::query()->find($id);
        return $place;
    }

    public function update(int $id, array $values): bool
    {
        return PlaceEntity::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return PlaceEntity::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return PlaceEntity::query()->where('id', $id)->exists();
    }

    public function getByName(string $name): ?PlaceEntityInterface
    {
        /** @var PlaceEntity $place */
        $place = PlaceEntity::query()->where('name', $name)->first();
        return $place;
    }
}
