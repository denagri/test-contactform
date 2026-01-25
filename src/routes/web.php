<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestContactController;
use App\Http\Controllers\AuthController;
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
Route::post('/confirm',[TestContactController::class,'confirm']);
Route::post('/contacts',[TestContactController::class,'store']);
Route::get('/admin',[AuthController::class,'index']);
Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
});

/**Route::post('/admin',[AdminController::class,'index']);**/

Route::post('/logout',function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
Route::post('/delete',[AdminController::class,'destroy']);
Route::get('/search',[AdminController::class,'search']);
Route::get('/reset',[AdminController::class,'reset']);
Route::post('/export',[AdminController::class,'']);