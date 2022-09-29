<?php

use Illuminate\Support\Facades\Route;
use App\Http\Player\Controllers;

Route::post('login/telegram', Controllers\Login\TelegramLoginController::class)
    ->name('login.telegram');

Route::post('game', Controllers\Game\AddGameController::class)
    ->name('game.add');

Route::prefix('table')->name('table.')->group(function () {
    Route::post('/', Controllers\Table\AddTableController::class)->name('add');
    Route::delete('/', Controllers\Table\DeleteTableController::class)->name('delete');
    Route::patch('/', Controllers\Table\UpdateTableController::class)->name('update');

    Route::patch('/leave', Controllers\Table\LeaveTableController::class)->name('leave');
    Route::patch('/seat', Controllers\Table\SeatAtTableController::class)->name('seat');
});
