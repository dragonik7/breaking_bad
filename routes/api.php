<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/user'], function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('user.login');

});
Route::group(['middleware' => ['auth:sanctum', 'counting.request', 'throttle:20']], function () {
    Route::group(['prefix' => 'episodes'], function () {
        Route::get('/', [EpisodeController::class, 'index']);
        Route::get('/{episode_id}', [EpisodeController::class, 'show']);
    });
    Route::group(['prefix' => 'characters'], function () {
        Route::get('/', [CharacterController::class, 'index']);
        Route::get('/random', [CharacterController::class, 'randomCharacter']);
    });

    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', [QuoteController::class, 'index']);
        Route::get('/random', [QuoteController::class, 'random_quotes']);
    });
    Route::get('/stats', [StatisticController::class, 'numberOfRequestUsers']);
    Route::get('/my-stats', [StatisticController::class, 'numberOfRequestUser']);
});

