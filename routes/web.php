<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    //return view('welcome');
    //return view('backend.dashboard');
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    //Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'admin_show_user'])->name('admin_show_user');
    Route::get('/edit-user/{user}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit_user');
    Route::put('/edit-user/{user}', [App\Http\Controllers\HomeController::class, 'update_user'])->name('edit_user');
    Route::get('/generate/affiliate/link', [App\Http\Controllers\HomeController::class, 'generate_link'])->name('generate_link');
    Route::get('/generate/link', [App\Http\Controllers\HomeController::class, 'link_create'])->name('link_create');

    // ontic
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/find/subcategory/info', [App\Http\Controllers\ProductController::class, 'find_subcategory'])->name('find_subcategory');
});










Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});


/*
    |--------------------------------------------------------------------------
    | Route with authentication start
    |--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
