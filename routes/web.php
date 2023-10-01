<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



// Page Routes
Route::get("/",[TaskController::class,"page"]);


// Task Route
Route::get("task-by-id/{id}",[TaskController::class,"taskyByID"]);
Route::get("get-task",[TaskController::class,"getTask"]);
Route::post("create-task",[TaskController::class,"createTask"]);
Route::post("delete-task",[TaskController::class,"deleteTask"]);
