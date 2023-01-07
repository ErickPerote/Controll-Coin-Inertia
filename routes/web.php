<?php

use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenditureController;
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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/despesas', [ExpenditureController::class, 'index'])->name('expenditure');
    Route::post('/despesas', [ExpenditureController::class, 'store'])->name('expenditure.store');
    Route::put('/despesas/{expenditure}', [ExpenditureController::class, 'update'])->name('expenditure.update');
});*/

Route::resource('expenditure', ExpenditureController::class)->middleware('auth');
Route::resource('earning', AddMoneyController::class)->middleware('auth');



require __DIR__.'/auth.php';
