<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
Route::post('user/register', [FrontendController::class, 'registerSubmit'])->name('register.submit');
// logout controller
Route::get('user/logout', [FrontendController::class, 'logout'])->name('user.logout');

// user controll moves
Route::get('user-index', [HomeController::class, 'index'])->name('user.profile');

// category page move to next page

Route::get('/product-cat/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', [FrontendController::class, 'productSubCat'])->name('product-sub-cat');

// fillter
Route::match(['get', 'post'], '/filter', [FrontendController::class, 'productFilter'])->name('shop.filter');
Route::get('/product-cat/{slug}', [FrontendController::class, 'productCat'])->name('product-cat');
Route::get('product-detail/{slug}', [FrontendController::class, 'productDetail'])->name('product-detail');
Route::get('/product-brand/{slug}', [FrontendController::class, 'productBrand'])->name('product-brand');
Route::get('/product-grids', [FrontendController::class, 'productGrids'])->name('product-grids');


// wishlist
Route::get('/wishlist/{slug}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist')->middleware('user');

// cart section

Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart')->middleware('user');
Route::post('/add-to-cart', [CartController::class, 'singleAddToCart'])->name('single-add-to-cart')->middleware('user');
