<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\CategoriesSubCategoriesController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', [CategoriesController::class, 'index']);
Route::post('categories', [CategoriesController::class, 'store']);
Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);

Route::get('subCategories', [SubCategoriesController::class, 'index']);
Route::post('subCategories', [SubCategoriesController::class, 'store']);
Route::delete('subCategories/{id}', [SubCategoriesController::class, 'destroy']);

Route::get('categories_subcategories', [CategoriesSubCategoriesController::class, 'index']);
Route::post('categories_subcategories', [CategoriesSubCategoriesController::class, 'store']);
Route::delete('categories_subcategories/{id}', [CategoriesSubCategoriesController::class, 'destroy']);git init



Route::get('/api/documentation', function () {
    return view('swagger');
});
Route::get('/example', function () {
    return response()->json(['message' => 'Hello, API!']);
});
