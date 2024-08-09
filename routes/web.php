<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::prefix('tasks')->middleware('auth')->group(function(){
    Route::get('/', [TaskController::class, 'tasks'])->name('tasks');

    Route::get('/create', [TaskController::class, 'form'])->name('form');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    
    Route::get('/{task}', [TaskController::class, 'update'])->name('updatePage');
    Route::post('/{task}', [TaskController::class, 'save'])->name('update');
    
    Route::delete('/{task}', [TaskController::class, 'delete'])->name('delete');
});




