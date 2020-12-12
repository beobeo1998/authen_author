<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home',[LoginController::class,'index'])->middleware('auth')->name('home');

Route::get('/login',[LoginController::class,'getLogin'])->name('get.login')
        ->middleware('guest');
Route::post('/login',[LoginController::class,'postLogin'])->name('post.login')
        ->middleware('guest');

Route::get('logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');

Route::get('register',[LoginController::class,'getRegister'])->name('get.register');
Route::post('register',[LoginController::class,'postRegister'])->name('post.register');
