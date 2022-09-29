<?php

namespace App\Providers;

use App\Domain\Interfaces\Repositories\EventRepositoryInterface;
use App\Domain\Interfaces\Repositories\GameRepositoryInterface;
use App\Domain\Interfaces\Repositories\PlaceRepositoryInterface;
use App\Domain\Interfaces\Repositories\PlayerRepositoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Repositories\EventEloquentRepository;
use App\Repositories\GameEloquentRepository;
use App\Repositories\PlaceEloquentRepository;
use App\Repositories\PlayerEloquentRepository;
use App\Repositories\TableEloquentRepository;
use Illuminate\Support\ServiceProvider;

class DependenciesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EventRepositoryInterface::class, EventEloquentRepository::class);
        $this->app->bind(GameRepositoryInterface::class, GameEloquentRepository::class);
        $this->app->bind(TableRepositoryInterface::class, TableEloquentRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerEloquentRepository::class);
        $this->app->bind(PlaceRepositoryInterface::class, PlaceEloquentRepository::class);


    }
}
