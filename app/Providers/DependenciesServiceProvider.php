<?php

namespace App\Providers;

use App\Domain\Interfaces\Factories as FactoriesInterfaces;
use App\Domain\Interfaces\Repositories as RepositoriesInterfaces;
use App\Domain\Interfaces\Services as ServicesInterfaces;
use App\Domain\UseCases;

use App\Adapters\Presenters;
use App\Factories;
use App\Http\Player\Controllers\Game;
use App\Http\Player\Controllers\Login;
use App\Http\Player\Controllers\Table;

use App\Repositories;
use App\Services;

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
        $this->repositories();
        $this->factories();
        $this->services();
        $this->playerControllers();


    }

    private function repositories()
    {
        $this->app->bind(RepositoriesInterfaces\EventRepositoryInterface::class, Repositories\EventEloquentRepository::class);
        $this->app->bind(RepositoriesInterfaces\GameRepositoryInterface::class, Repositories\GameEloquentRepository::class);
        $this->app->bind(RepositoriesInterfaces\TableRepositoryInterface::class, Repositories\TableEloquentRepository::class);
        $this->app->bind(RepositoriesInterfaces\PlayerRepositoryInterface::class, Repositories\PlayerEloquentRepository::class);
        $this->app->bind(RepositoriesInterfaces\PlaceRepositoryInterface::class, Repositories\PlaceEloquentRepository::class);
    }

    private function factories()
    {
        $this->app->bind(FactoriesInterfaces\EventFactoryInterface::class, Factories\EventFactory::class);
        $this->app->bind(FactoriesInterfaces\GameFactoryInterface::class, Factories\GameFactory::class);
        $this->app->bind(FactoriesInterfaces\PlaceFactoryInterface::class, Factories\PlaceFactory::class);
        $this->app->bind(FactoriesInterfaces\PlayerFactoryInterface::class, Factories\PlayerFactory::class);
        $this->app->bind(FactoriesInterfaces\TableFactoryInterface::class, Factories\TableFactory::class);
    }

    private function services()
    {
        $this->app->bind(ServicesInterfaces\AuthServiceInterface::class, Services\LaravelAuthService::class);
        $this->app->bind(ServicesInterfaces\TelegramServiceInterface::class, Services\TelegramService::class);
        $this->app->bind(ServicesInterfaces\TableServiceInterface::class, Services\TableService::class);

    }

    private function playerControllers()
    {
        $this->app
            ->when(Game\AddGameController::class)
            ->needs(UseCases\Game\Add\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Game\Add\Interactor::class, [
                    'output' => $app->make(Presenters\Game\Add\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Table\DeleteTableController::class)
            ->needs(UseCases\Table\Delete\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Delete\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Delete\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Table\LeaveTableController::class)
            ->needs(UseCases\Table\RemovePlayer\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\RemovePlayer\Interactor::class, [
                    'output' => $app->make(Presenters\Table\RemovePlayer\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Table\SeatAtTableController::class)
            ->needs(UseCases\Table\AddPlayer\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\AddPlayer\Interactor::class, [
                    'output' => $app->make(Presenters\Table\AddPlayer\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Table\UpdateTableController::class)
            ->needs(UseCases\Table\Update\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Update\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Update\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Table\AddTableController::class)
            ->needs(UseCases\Table\Add\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Add\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Add\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(Login\TelegramLoginController::class)
            ->needs(UseCases\Player\LoginViaTelegram\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Player\LoginViaTelegram\Interactor::class, [
                    'output' => $app->make(Presenters\Player\LoginViaTelegram\JsonPresenter::class),
                ]);
            });
    }
}
