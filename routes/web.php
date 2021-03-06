<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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
    return view('pages.welcome');
});

Route::get('/signup', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/post/signup', [RegisterController::class, 'register'])->name('post_register');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/post/login', [LoginController::class, 'login'])->name('post_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('user', 'admin');
Route::get('/detail/{book_id}', [DetailController::class, 'index'])->name('detail_route')->middleware('user', 'admin');

Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('user', 'admin');
Route::get('/addToCart/{book_id}', [CartController::class, 'store'])->name('addToCart')->middleware('user', 'admin');
Route::get('/addFromCart/{id}', [CartController::class, 'destroy'])->name('remove_from_cart')->middleware('user', 'admin');
Route::get('/submit_cart', [CartController::class, 'saveAll'])->name('submit_cart')->middleware('user', 'admin');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('user', 'admin');
Route::post('/post/profile', [ProfileController::class, 'update'])->name('update_profile')->middleware('user', 'admin');

Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('admin');
Route::get('/account/update/{id}', [AccountController::class, 'updateRoleIndex'])->name('update_account')->middleware('admin');
Route::post('/post/updateAccount/{id}', [AccountController::class, 'updateUserRole'])->name('update_user_role')->middleware('admin');
Route::get('/account/delete/{id}', [AccountController::class, 'destroy'])->name('delete_account')->middleware('admin');