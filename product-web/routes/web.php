<?php

use App\Http\Controllers\ClasificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index_login')->name('login.index');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login_user')->name('user.login');
});

Route::middleware(['auth', 'role:Admin'])->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::post('/logout', 'logout_user')->name('user.logout');
    });

    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index_home')->name('home.index');
    });

    Route::controller(ClasificationController::class)->group(function () {
        Route::get('/dashboard/clasification', 'index_clasification')->name('clasification.index');
        Route::post('/dashboard/clasification/create', 'create_clasification')->name('clasification.create');
        Route::get('/dashboard/clasification/{clasification}/edit', 'edit_clasification')->name('clasification.edit');
        Route::patch('/dashboard/clasification/{clasification}/edit', 'update_clasification')->name('clasification.update');
        Route::delete('/dashboard/clasification/{clasification}/delete', 'delete_clasification')->name('clasification.delete');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/dashboard/product', 'index_product')->name('product.index');
        Route::post('/dashboard/product/create', 'create_product')->name('product.create');
        Route::get('/dashboard/product/{product}/edit', 'edit_product')->name('product.edit');
        Route::patch('/dashboard/product/{product}/edit', 'update_product')->name('product.update');
        Route::delete('/dashboard/product/{product}/delete', 'delete_product')->name('product.delete');
    });
});


