<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ProductCategoryController,
    ProductController,
    UserController
};

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
    return view('welcome');
});

Route::prefix('/dashboard')
->middleware('auth')
    ->group(function() {
        Route::controller(DashboardController::class)
            ->group(function(){
                Route::get('/', 'index');
            });
        
        Route::prefix('/product-categories')
            ->controller(ProductCategoryController::class)
            ->group(function(){
                Route::delete('/{productCategory}', 'destroy');
                Route::get('/', 'index');
                Route::get('/create', 'create');
                Route::get('/{productCategory}/edit', 'edit');
                Route::post('/', 'store');
                Route::put('/{productCategory}', 'update');
            });
    });

Route::prefix('/login')
    ->controller(UserController::class)
    ->group(function(){
        Route::get('/', 'login')->name('login');
        Route::post('/', 'login');
    });

Route::prefix('/signup')
    ->controller(UserController::class)
    ->group(function() {
        Route::get('/', 'create');
        Route::post('/', 'signup');
    });

Route::prefix('/product-categories')
    ->controller(ProductCategoryController::class)
    ->group(function(){
        // Mettere tutto ciò che è visibile solo agli utenti non loggati
    });

Route::prefix('/products')
    ->controller(ProductController::class)
    ->group(function(){
        Route::delete('/{product}', 'destroy');
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/order', 'order');
        Route::get('/{product}/edit', 'edit');
        Route::post('/', 'store');
        Route::put('/{product}', 'update');
    });
