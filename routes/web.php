<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\usersDataController;
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

// users create / update/ delete
Route::get('/', [usersDataController::class, 'index'])->name('usersIndex');
Route::get('/create', [usersDataController::class, 'create'])->name('usersCreate');
Route::post('/store', [usersDataController::class, 'store'])->name('usersStore');
Route::get('/edit/{id}', [usersDataController::class, 'edit'])->name('userEdit');
Route::post('/update/{id}', [usersDataController::class, 'update'])->name('usersUpdate');
Route::get('/deleteUser/{id}', [usersDataController::class, 'destroy'])->name('deleteUser');
