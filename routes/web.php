<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

//tasks
//making cards from bootstrap with default design

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [FrontController::class, 'index'])->name('home');
Route::get('/homee', [FrontController::class, 'home'])->name('homee');
Route::get('/note/{id}', [FrontController::class, 'note'])->name('note');
