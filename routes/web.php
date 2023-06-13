<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

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
    return view('auth.login');
});

// Routes accessible to all authenticated users
Route::middleware(['auth'])->group(function() { 
// Routes accessible to users
Route::middleware([User::class])->group(function () {
    // Redirect user to /pages after login
    Route::get('/pages', [App\Http\Controllers\PageController::class, 'index'])->name('pages');
});
// Admin-only routes
Route::middleware([Admin::class])->group(function () {
    //Home dashboard for Admin
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Users CRUD routes
    Route::resource('/users', UserController::class);

    // Roles CRUD routes
    Route::resource('/roles', RoleController::class);

    // Pages CRUD routes
    Route::resource('/pages', PageController::class);
});

});


Auth::routes();
