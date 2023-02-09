<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\FE\CategoryController as FE_CategoryController;
use App\Http\Controllers\FE\MenuController as FE_MenuController;
use App\Http\Controllers\FE\ReservationController as FE_ReservationController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ReservationController as User_ReservationController;
use App\Http\Controllers\FE\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [WelcomeController::class, 'index'])->name('home');;
Route::get('/categories', [FE_CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FE_CategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FE_MenuController::class, 'index'])->name('menus.index');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('/addCart/{id}', [CartController::class, 'addToCart']);
Route::get('/saveCart/{id}/{quantity}', [CartController::class, 'saveCart']);
Route::get('/removeCart/{id}/{quantity}', [CartController::class, 'removeCart']);
Route::get('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('/detail/{id}', [CartController::class, 'detail']);
Route::post('/payment-MoMo', [CheckoutController::class, 'paymentMoMo'])->name('paymentMoMo');

//Dashboard
Route::get('/login/successfully', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Reservation
Route::middleware(['auth'])
    ->group(function () {
        Route::get('/reservation/step-one', [FE_ReservationController::class, 'stepOne'])->name('reservations.step.one');
        Route::post('/reservation/step-one', [FE_ReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
        Route::get('/reservation/step-two', [FE_ReservationController::class, 'stepTwo'])->name('reservations.step.two');
        Route::post('/reservation/step-two', [FE_ReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
        Route::get('/successfully', [FE_ReservationController::class, 'successfully'])->name('successfully');
    });

Route::middleware(['auth', 'user'])
    ->name('user.')
    ->prefix('user')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::resource('/reservations', User_ReservationController::class)->name('*','reservations');
    });

Route::middleware(['auth', 'admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/menus', MenuController::class);
        Route::resource('/tables', TableController::class);
        Route::resource('/reservations', ReservationController::class);
    });

require __DIR__ . '/auth.php';
