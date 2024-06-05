<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::redirect('/', '/product')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function() {
    // Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
    // Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    // Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    // Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    // Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    // Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::resource('product', ProductController::class);
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/item/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
