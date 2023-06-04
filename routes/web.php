<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
})->name('login');

//homepage / dashboard
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//Users CRUD routes
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('destroy');
Route::get('/users/{id}',[UserController::class, 'edit'])->name('edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('update');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::resource('users', UserController::class);

//Roles CRUD routes
Route::resource('roles', RoleController::class);
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');