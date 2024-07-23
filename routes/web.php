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
Route::get('/', [App\Http\Controllers\Klasemen::class, 'index'])->name('home');
Route::resource('/klub', App\Http\Controllers\Klub::class);
Route::resource('/skor', App\Http\Controllers\Skor::class);
Route::resource('/skor-multiple', App\Http\Controllers\SkorMultiple::class);
