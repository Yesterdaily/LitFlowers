<?php
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::inertia('/privacy-policy', 'PrivacyPolicy')->name('privacy-policy');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('shops', function () {
        return Inertia::render('Shops');
    })->name('shops');
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


require __DIR__.'/auth.php';
