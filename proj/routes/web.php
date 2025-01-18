<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

Route::get('/greet', [App\Http\Controllers\GreetController::class, 'showGreet']);