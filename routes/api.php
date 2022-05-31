<?php

use App\Http\Controllers\API\BookingsController;
use App\Http\Controllers\API\RoomsController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', [UsersController::class, 'show']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/room', [RoomsController::class, 'addRoom']);
    Route::get('/room', [RoomsController::class, 'getRooms']);
    Route::post('/bookings', [BookingsController::class, 'book']);
});
