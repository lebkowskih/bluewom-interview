<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserFavoriteCurrencyController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'verified'])->prefix('/currencies')->group(function () {
    Route::get('/', [CurrencyController::class, 'index'])->name('dashboard');
    Route::prefix('/favorite')->group(function () {
        Route::post('/add/{currency}', [UserFavoriteCurrencyController::class, 'store'])->name('currencies.favorite.add');
        Route::delete('/delete', [UserFavoriteCurrencyController::class, 'deleteAll'])->name('currencies.favorite.delete.all');
        Route::delete('/delete/{currency}', [UserFavoriteCurrencyController::class, 'delete'])->name('currencies.favorite.delete');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
