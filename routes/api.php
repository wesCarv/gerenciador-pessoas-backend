<?php


use App\Http\Controllers\TaxesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/users', [UserController::class, 'create']);
Route::post('/taxes', [TaxesController::class,'create']);

Route::get('/taxes/all',[TaxesController::class,'index']);
Route::get('/users/all', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class,'show']);

Route::patch('/taxes/{id}', [TaxesController::class,'update']);
Route::patch('/users/{id}', [UserController::class, 'update']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);
Route::delete('/taxes/{id}', [TaxesController::class, 'destroy']);