<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');


