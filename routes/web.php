<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Way to Home , First Page
Route::get('/',[FrontendController::class, 'home'])->name('home');
// company info
Route::get('/header',[AdminController::class,'company'])->name('company');
// fronend spotted place to home page route
Route::get('/home', [FrontendController::class, 'index']);//order traking route

// order traking
Route::get('/product/track', [OrderController::class, 'orderTrack'])->name('order.track');

// login / register
Route::get('user/login', [FrontendController::class, 'login'])->name('login.form');
Route::post('user/login', [FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('user/register', [FrontendController::class, 'register'])->name('register.form');
