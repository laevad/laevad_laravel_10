<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// group for admin
Route::middleware(['auth', 'is.admin'])->group(function () {
    //    prefix and name admin
    Route::prefix('admin')->name('admin.')->group(function () {
        // dashboard
        Route::get('/dashboard', \App\Http\Livewire\Admin\Dashboard::class)->name('dashboard');
    });
});

// group for user
Route::middleware(['auth', 'is.user'])->group(function () {
    //    prefix and name user
    Route::prefix('user')->name('user.')->group(function () {
        // dashboard
        Route::get('/dashboard', \App\Http\Livewire\User\Dashboard::class)->name('dashboard');
    });
});

