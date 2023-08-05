<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\EpisodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request)
{
	return $request->user();
});
Route::group(['prefix' => 'episodes'], function ()
{
	Route::get('/', [EpisodeController::class, 'index']);
	Route::get('/{episode}', [EpisodeController::class, 'show']);

});
Route::group(['prefix' => 'characters'], function ()
{
	Route::get('/', [CharacterController::class, 'index']);
});