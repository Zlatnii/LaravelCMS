<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index']);
Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('destroy');
Route::get('/users/{id}',[UserController::class, 'edit'])->name('edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('update');
Route::resource('users', UserController::class);

