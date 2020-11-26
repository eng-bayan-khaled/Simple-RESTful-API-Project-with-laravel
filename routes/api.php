<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\KeywordsController;
use App\Http\Controllers\AuthersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;


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


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group(['middleware' => 'api'], function ($router) {
    Route::resource('articles', ArticlesController::class)->except(['edit', 'update', 'create']);
    Route::resource('keywords', KeywordsController::class)->except(['edit', 'update', 'create']);
    Route::resource('authers', AuthersController::class)->except(['edit', 'update', 'create']);
    Route::resource('comments', CommentsController::class)->except(['edit', 'update', 'create']);
});

