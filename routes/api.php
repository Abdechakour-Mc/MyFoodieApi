<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\RecipeTagsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ZonesController;
use App\Http\Controllers\AuthController;
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
Route::get('/test', function () {
    return 'Authentiacted';
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
});

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/recipes', RecipesController::class);
    Route::apiResource('/recipeTags',RecipeTagsController::class);
    Route::apiResource('/recipes', RecipesController::class);
    Route::apiResource('/categories', CategoriesController::class);
    Route::apiResource('/zones', ZonesController::class);

});