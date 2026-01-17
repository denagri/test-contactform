<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[TestContactController::class,'index']);
Route::get('/confirm',[TestContactController::class,'confirm']);
Route::post('/confirm',[TestContactController::class,'confirm']);
Route::get('/contacts',[TestContactController::class,'store']);
Route::post('/contacts',[TestContactController::class,'store']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'index']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'index']);
Route::get('/admin',[AdminController::class,'index']);
Route::post('/admin',[AdminController::class,'index']);