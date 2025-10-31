<?php

use App\Http\Controllers\api\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/homeless', function () {
    $serverName = $_SERVER['SERVER_NAME'];
    return $serverName;
});
Route::get("blogs", [BlogController::class, "blogs"])->name("blogs");



