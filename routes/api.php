<?php

use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\UserController;
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

// Auth Controller
Route::post('/v1/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'user.access', 'prefix' => 'v1'], function () {
    // Auth Controller
    Route::group(['prefix' => 'auth'], function () {
        Route::delete('logout', [AuthController::class, 'logout']);
        Route::put('refresh', [AuthController::class, 'refresh']);
        Route::delete('revoke', [AuthController::class, 'revoke']);
        Route::get('sessions', [AuthController::class, 'sessions']);
    });

    // Category Controller
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'get']);
        Route::get('/properties/{id}', [CategoryController::class, 'properties']);
    });

    // Product Controller
    Route::group(['prefix' => 'product'], function () {
        Route::get('/list', [ProductController::class, 'list']);
        Route::get('/{id}', [ProductController::class, 'get']);
    });

    // User Controller
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'get']);
    });
});
