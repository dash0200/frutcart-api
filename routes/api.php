<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [RegisterController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::controller(SellerController::class)->middleware(['auth:api', 'seller'])->group(function () {
    Route::post('add-products', 'store');
    Route::get('get-products', 'getProducts');
    Route::post('update-products', 'updateProducts');
});

Route::controller(BuyerController::class)->middleware(['auth:api', 'buyer'])->group(function () {
    Route::get('get-sellers', 'getSellers');
    Route::get('get-chart', 'getChart');
});