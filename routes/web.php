<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', [App\Http\Controllers\HomeController::class, 'create'])->name('home.create');
Route::get('/home/edit/{user}', [App\Http\Controllers\HomeController::class, 'edit'])->name('home.update');
Route::put('/home/update/{user}', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');
Route::post('/home/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::delete('/home/delete/{user}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');