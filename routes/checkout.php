<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutLoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest.checkout')->group(function () {
    Route::get('{uuid}/login', [CheckoutLoginController::class, 'create'])->name('checkout.login');
    Route::post('{uuid}/login', [CheckoutLoginController::class, 'store']);
});

Route::middleware('auth:checkout')->group(function () {
    Route::get('{uuid}/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('{uuid}/checkout', [TransactionController::class, 'store'])->name('checkout.store');
});

