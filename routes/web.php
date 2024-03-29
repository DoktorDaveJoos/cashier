<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutLoginController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/dashboard', [DashboardController::class, 'fake'])
    ->middleware(['auth', 'verified'])
    ->name('fake');

Route::get('/checkouts', [DashboardController::class, 'checkouts'])
    ->middleware(['auth', 'verified'])
    ->name('checkouts');

Route::get('/products', [DashboardController::class, 'products'])
    ->middleware(['auth', 'verified'])
    ->name('products');

require __DIR__ . '/auth.php';
