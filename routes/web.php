<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SmsController;
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

Route::get('/', function(){
    return view('landingpage');
    
});

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');



Route::get('/sms', [SmsController::class, 'index']);

Route::get('/dashboard', [ItemController::class, 'index']);
Route::get('/dashboard/new', [ItemController::class, 'create']);
Route::post('/dashboard', [ItemController::class, 'store']);
Route::get('/dashboard/edit/{item}', [ItemController::class, 'edit']);
Route::patch('/dashboard/edit/{item}', [ItemController::class, 'update']);
Route::get('/dashboard/delete/{item}', [ItemController::class, 'delete']);
Route::delete('/dashboard/delete/{item}', [ItemController::class, 'destroy']);
