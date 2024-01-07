<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
//     $data = User::get();
//     return view('index', compact('data'));
// });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login.proses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register.proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Route::get('/user', [HomeController::class, 'index']);

    Route::get('/profile/user-profile', [HomeController::class, 'user_profile'])->name('profile.user-profile');
    Route::put('/profile/user-profile', [HomeController::class, 'user_profile_update'])->name('profile.user-profile-update');
    Route::get('/profile/detailuser/{id}', [HomeController::class, 'detail_user'])->name('profile.user-detail');

    Route::get('/profile/user-manage', [HomeController::class, 'user_manage'])->name('profile.user-manage');
    Route::delete('/profile/user-delete/{id}', [HomeController::class, 'user_delete'])->name('profile.user-delete');

    Route::put('/buy/{id}', [HomeController::class, 'buy'])->name('product.buy');
    Route::get('/show/cartproduct', [HomeController::class, 'cart_buy'])->name('product.product-cart');
    // Route::post('/pay', [HomeController::class, 'pay'])->name('product.pay');
    Route::get('/show/detailproduct/{id}', [HomeController::class, 'detail_buy'])->name('product.product-detail');
    Route::delete('/show/deleteproduct/{id}', [HomeController::class, 'delete_buy'])->name('product.product-delete');

    Route::get('/show', [HomeController::class, 'show'])->name('product.show');

    Route::get('/create', [HomeController::class, 'create'])->name('product.create');
    Route::post('/store', [HomeController::class, 'store'])->name('product.store');

    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('product.update');

    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('product.delete');
});
