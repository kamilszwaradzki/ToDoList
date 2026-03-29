<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'create']);
Route::get('index', [TaskController::class, 'index']);
Route::get('data', [TaskController::class, 'store']);
