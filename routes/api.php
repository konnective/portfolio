<?php

use Illuminate\Routing\Route;

Route::get('/home', function () {
    $serverName = $_SERVER['SERVER_NAME'];
    return $serverName;
});
