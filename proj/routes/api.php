<?php

use App\Http\Controllers\ItemTaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('itemtask', ItemTaskController::class); 