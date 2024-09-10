<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Payment\CardController;
use App\Http\Controllers\Payment\StripeController;
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

//routes for authentication
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});



//authenticated routes for payment
Route::group(['prefix' => 'payment', 'middleware' => 'jwt.verify'], function () {
    Route::post('save-card', [CardController::class, 'saveCardDetails']);
    Route::post('stripe/charge', [StripeController::class, 'charge']);
});
