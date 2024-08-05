<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\IndexController;
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
//     return view('welcome');
// });

Route::get('/',                                 [IndexController::class, 'index'])->name('home');
Route::get('/san-pham',                         [IndexController::class, 'products'])->name('products');
Route::get('/san-pham/{id}',                    [IndexController::class, 'product'])->name('product');
Route::post('/comment',                         [CommentController::class, 'store'])->name('comment');

Route::get('/contact',                          [IndexController::class, 'contact'])->name('contact');

Route::get('/gio-hang',                         [IndexController::class, 'cart'])->name('cart');
Route::get('/thanh-toan',                       [IndexController::class, 'checkout'])->name('checkout');

Route::get('/login',                            [IndexController::class, 'login'])->name('login');
Route::get('/register',                         [IndexController::class, 'register'])->name('register');

// Protected routes for admin
Route::prefix('admin')->group(function () {
    // Dashboard Routes
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Product Routes
    Route::get('san-pham', [ProductController::class, 'index'])->name('products.index');
    Route::get('san-pham/them-moi', [ProductController::class, 'create'])->name('products.create');
    Route::post('san-pham', [ProductController::class, 'store'])->name('products.store');
    Route::get('san-pham/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('san-pham/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('san-pham/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('san-pham/xoa/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Category Routes
    Route::get('danh-muc', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('danh-muc/them-moi', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('danh-muc/xu-ly-them', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('danh-muc/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('danh-muc/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('danh-muc/{id}/xu-ly', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('danh-muc/{id}/xoa', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
