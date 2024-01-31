<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinsiController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProvinsiController::class)
    ->group(function () {
        Route::get('/provinsi', 'index')->name('provinsi-index');
        Route::get('/provinsi/{id}', 'getDataProvinsi')->name('provinsi-getdata');
        Route::post('/provinsi', 'store')->name('provinsi-store');
        Route::put('/provinsi/{id}', 'update')->name('provinsi-update');
        Route::delete('/provinsi/{id}', 'destroy')->name('provinsi-destroy');
    });

require __DIR__ . '/auth.php';
