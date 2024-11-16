<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Models\User;

// use App\Http\Middleware\isAdmin;

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

// Route::get('/', [Controller::class , 'view_welcome'])->name('welcome');
Route::get('/', [userProductController::class , 'index'])->name('welcome.index');//مؤقتا
Route::get('/products', [UserProductController::class , 'index'])->name('products.index');
Route::get('/login', [UserController::class , 'viewLogin'])->name('login.index');
Route::get('/register', [UserController::class , 'viewRegister'])->name('register.index');
Route::post('/login', [UserController::class , 'authenticate'])->name('login.authenticate');
Route::post('/register', [UserController::class , 'store'])->name('register.store');
Route::get('/about', [UserController::class , 'view_about'])->name('about.index');
Route::get('/profile/{username}',[UserController::class , 'view_profile'])->name('profile.index')->middleware('auth');
Route::get('/dashbord', [UserController::class , 'view_dashbord'])->middleware('isAdmin')->name('dashbord.index');
Route::resource('categories', CategoryController::class)->middleware('isAdmin');
Route::resource('adminproducts', ProductController::class)->middleware('isAdmin');
// Route::resource('products', productController::class)->only(['index', 'show']);
// Route::resource('products', productController::class)->except(['index', 'show'])->middleware('isAdmin');
Route::resource('products', UserProductController::class);
Route::get('/adminproductsbycategory/{id}', [ProductController::class , 'productsByCategory'])->name('adminproducts.by.category')->middleware('isAdmin');
Route::get('/productsbycategory/{id}', [UserProductController::class , 'productsByCategory'])->name('products.by.category');
Route::get('/search', [UserProductController::class , 'searchProductByName'])->name('products.search');
// ->middleware('auth');
Route::post('/logout', [UserController::class , 'logout'])->name('logout');
