<?php

namespace App\Providers;

use App\Adapters\Presenters;
use App\Domain\Interfaces\Factories\EventFactoryInterface;
use App\Domain\Interfaces\Factories\GameFactoryInterface;
use App\Domain\Interfaces\Factories\PlaceFactoryInterface;
use App\Domain\Interfaces\Factories\PlayerFactoryInterface;
use App\Domain\Interfaces\Factories\TableFactoryInterface;
use App\Domain\Interfaces\Repositories\EventRepositoryInterface;
use App\Domain\Interfaces\Repositories\GameRepositoryInterface;
use App\Domain\Interfaces\Repositories\PlaceRepositoryInterface;
use App\Domain\Interfaces\Repositories\PlayerRepositoryInterface;
use App\Domain\Interfaces\Repositories\TableRepositoryInterface;
use App\Domain\Interfaces\Services\AuthServiceInterface;
use App\Domain\Interfaces\Services\TableServiceInterface;
use App\Domain\Interfaces\Services\TelegramServiceInterface;
use App\Domain\UseCases;
use App\Factories\EventFactory;
use App\Factories\GameFactory;
use App\Factories\PlaceFactory;
use App\Factories\PlayerFactory;
use App\Factories\TableFactory;
use App\Http\Player\Controllers\Game\AddGameController;
use App\Http\Player\Controllers\Login\TelegramLoginController;
use App\Http\Player\Controllers\Table\AddTableController;
use App\Http\Player\Controllers\Table\DeleteTableController;
use App\Http\Player\Controllers\Table\LeaveTableController;
use App\Http\Player\Controllers\Table\SeatAtTableController;
use App\Http\Player\Controllers\Table\UpdateTableController;
use App\Repositories\EventEloquentRepository;
use App\Repositories\GameEloquentRepository;
use App\Repositories\PlaceEloquentRepository;
use App\Repositories\PlayerEloquentRepository;
use App\Repositories\TableEloquentRepository;
use App\Services\LaravelAuthService;
use App\Services\TableService;
use App\Services\TelegramService;
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
        $this->app->bind(EventRepositoryInterface::class, EventEloquentRepository::class);
        $this->app->bind(GameRepositoryInterface::class, GameEloquentRepository::class);
        $this->app->bind(TableRepositoryInterface::class, TableEloquentRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerEloquentRepository::class);
        $this->app->bind(PlaceRepositoryInterface::class, PlaceEloquentRepository::class);
    }

    private function factories()
    {
        $this->app->bind(EventFactoryInterface::class, EventFactory::class);
        $this->app->bind(GameFactoryInterface::class, GameFactory::class);
        $this->app->bind(PlaceFactoryInterface::class, PlaceFactory::class);
        $this->app->bind(PlayerFactoryInterface::class, PlayerFactory::class);
        $this->app->bind(TableFactoryInterface::class, TableFactory::class);
    }

    private function services()
    {
        $this->app->bind(AuthServiceInterface::class, LaravelAuthService::class);
        $this->app->bind(TelegramServiceInterface::class, TelegramService::class);
        $this->app->bind(TableServiceInterface::class, TableService::class);

    }

    private function playerControllers()
    {
        $this->app
            ->when(AddGameController::class)
            ->needs(UseCases\Game\Add\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Game\Add\Interactor::class, [
                    'output' => $app->make(Presenters\Game\Add\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(DeleteTableController::class)
            ->needs(UseCases\Table\Delete\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Delete\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Delete\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(LeaveTableController::class)
            ->needs(UseCases\Table\RemovePlayer\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\RemovePlayer\Interactor::class, [
                    'output' => $app->make(Presenters\Table\RemovePlayer\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(SeatAtTableController::class)
            ->needs(UseCases\Table\AddPlayer\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\AddPlayer\Interactor::class, [
                    'output' => $app->make(Presenters\Table\AddPlayer\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(UpdateTableController::class)
            ->needs(UseCases\Table\Update\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Update\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Update\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(AddTableController::class)
            ->needs(UseCases\Table\Add\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Table\Add\Interactor::class, [
                    'output' => $app->make(Presenters\Table\Add\JsonPresenter::class),
                ]);
            });

        $this->app
            ->when(TelegramLoginController::class)
            ->needs(UseCases\Player\LoginViaTelegram\InputPortInterface::class)
            ->give(function ($app) {
                return $app->make(UseCases\Player\LoginViaTelegram\Interactor::class, [
                    'output' => $app->make(Presenters\Player\LoginViaTelegram\JsonPresenter::class),
                ]);
            });
    }
}
