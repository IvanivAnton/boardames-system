<?php

namespace App\Repositories;

use App\Domain\Interfaces\Entities\PlaceInterface;
use App\Models\Place;

class PlaceEloquentRepository implements \App\Domain\Interfaces\Repositories\PlaceRepositoryInterface
{
    public function index($request): array
    {
        return Place::all();
    }

    public function create(PlaceInterface $place): ?PlaceInterface
    {
        /** @var ?Place $place */
        $place = Place::query()->create([
            'name' => $place->getName(),
            'address' => $place->getAddress(),
            'latitude' => $place->getLatitude(),
            'longitude' => $place->getLongitude(),
            'number_of_tables' => $place->getNumberOfTables(),
        ]);
        return $place;
    }

    public function get(int $id): ?PlaceInterface
    {
        /** @var ?Place $place */
        $place = Place::query()->find($id);
        return $place;
    }

    public function update(int $id, array $values): bool
    {
        return Place::query()->find($id)->update($values) > 0;
    }

    public function delete(int $id): bool
    {
        return Place::query()->find($id)->delete();
    }

    public function exists(int $id): bool
    {
        return Place::query()->where('id', $id)->exists();
    }

    public function getByName(string $name): ?PlaceInterface
    {
        /** @var Place $place */
        $place = Place::query()->where('name', $name)->first();
        return $place;
    }
}
