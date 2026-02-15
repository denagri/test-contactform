<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestContactController;
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

Route::get('/',[TestContactController::class,'index'])->name('home');
Route::post('/confirm',[TestContactController::class,'confirm']);
Route::post('/contacts',[TestContactController::class,'store']);
/*ログインしないと/adminに入れないようにミドルウェア認証*/
Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::post('/delete',[AdminController::class,'destroy']);
    Route::get('/search',[AdminController::class,'search']);
    /*exportがpostなのはエクスポートするデータが全てURLに乗ると長すぎてえらいことになるため*/
    Route::post('/export',[AdminController::class,'export']);
});