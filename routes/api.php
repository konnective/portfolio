<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/homeless', function () {
    $serverName = $_SERVER['SERVER_NAME'];
    return $serverName;
});
