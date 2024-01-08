<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    
    // Shops
    Route::get('shops', 'App\Http\Controllers\ShopController@index');
    Route::get('shops/{shop}', 'App\Http\Controllers\ShopController@show');
    Route::post('shops', 'App\Http\Controllers\ShopController@store');
    Route::put('shops/{shop}', 'App\Http\Controllers\ShopController@update');
    Route::delete('shops/{shop}', 'App\Http\Controllers\ShopController@destroy');
    
    // Catalogues
    Route::get('catalogues', 'App\Http\Controllers\CatalogueController@indexAll');
    Route::get('shops/{shop}/catalogues', 'App\Http\Controllers\CatalogueController@index');
    Route::get('shops/{shop}/catalogues/{catalogue}', 'App\Http\Controllers\CatalogueController@show');
    Route::post('shops/{shop}/catalogues', 'App\Http\Controllers\CatalogueController@store');
    Route::put('shops/{shop}/catalogues/{catalogue}', 'App\Http\Controllers\CatalogueController@update');
    Route::delete('shops/{shop}/catalogues/{catalogue}', 'App\Http\Controllers\CatalogueController@destroy');
    
    // Flowers
    Route::get('flowers', 'App\Http\Controllers\FlowerController@indexAll');
    Route::get('shops/{shop}/catalogues/{catalogue}/flowers', 'App\Http\Controllers\FlowerController@index');
    Route::get('shops/{shop}/catalogues/{catalogue}/flowers/{flower}', 'App\Http\Controllers\FlowerController@show');
    Route::post('shops/{shop}/catalogues/{catalogue}/flowers', 'App\Http\Controllers\FlowerController@store');
    Route::put('shops/{shop}/catalogues/{catalogue}/flowers/{flower}', 'App\Http\Controllers\FlowerController@update');
    Route::delete('shops/{shop}/catalogues/{catalogue}/flowers/{flower}', 'App\Http\Controllers\FlowerController@destroy');
    

    
});
