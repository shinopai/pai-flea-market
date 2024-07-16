<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 商品関連
    Route::prefix('items')->group(function () {
        Route::name('items.')->group(function () {
            Route::controller(ItemController::class)->group(function () {
                // 商品一覧画面
                Route::get('/', 'index')->name('index');
                // 商品詳細画面
                Route::get('/show/{item}', 'show')->name('show');
                // 出品画面
                Route::get('/create', 'create')->name('create');
                // 出品
                Route::post('/store', 'store')->name('store');
                // 商品検索
                Route::get('/search', 'search')->name('search');
            });
        });
    });

    // 購入関連
    Route::prefix('purchases')->group(function () {
        Route::name('purchases.')->group(function () {
            Route::controller(PurchaseController::class)->group(function () {
                // 商品購入画面
                Route::get('/', 'index')->name('index');
                // 商品購入
                Route::post('/store', 'store')->name('store');
            });
        });
    });
});

require __DIR__.'/auth.php';
