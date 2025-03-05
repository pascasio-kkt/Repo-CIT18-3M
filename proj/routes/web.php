<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemTaskController;
use App\Http\Controllers\GreetController;

// default laravel route
Route::get('/', function () {
    return view('welcome');
});

// just returns a message
Route::get('/hello', function () {
    return 'hi';
});

// calls the greetMethod of the GreetController class
Route::get(
    '/greet', 
    [GreetController::class, 'greetMethod']
);

// uses resource routes for ItemTask
/*
HTTP Method     URL                     Controller Method         Description
GET             /itemtask              index                     Display a listing of the tasks
GET             /itemtask/create       create                    Show the form for creating a task
POST            /itemtask              store                     Store a newly created task
GET             /itemtask/{id}         show                      Display a specific task
GET             /itemtask/{id}/edit    edit                      Show the form for editing a task
PUT/PATCH       /itemtask/{id}         update                    Update a specific task
DELETE          /itemtask/{id}         destroy                   Delete a specific task
*/
Route::resource('itemtasks', ItemTaskController::class);