<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',[UserController::class , 'viewLogin']);
Route::get('/profile',[UserController::class , 'viewProfile']);
Route::get('/profile/edit' ,[UserController::class , 'viewEdit']);


Route::post('/login',[UserController::class , 'loginAccount']);
Route::post('/profile/edit',[UserController::class , 'editAccount']);
Route::post('/profile/delete',[UserController::class , 'deleteAccount']);

Route::resource('tasks',TaskController::class);
