<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Fe\OlderController;
use App\Http\Controllers\Fe\CateController;

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
// ========================================================================================================================================

//user admin
    //logon
    Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
    Route::post('/logon', [AdminController::class, 'postLogon']);

    //logout    
    Route::get('/sing-out', [AdminController::class, 'singOut'])->name('singOut');

    //register
    Route::get('/signUp', [AdminController::class, 'signUp'])->name('signUp');
    Route::post('/signUp', [AdminController::class, 'postSignUp']);
    
// ========================================================================================================================================

//admin
Route::prefix('backend')->middleware('admin')->group(function () {
    
    //dashboard
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');

    //category
    Route::resource('/category', CategoryController::class);
    Route::get('/category-trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');

    //product
    Route::resource('/product', ProductController::class);
    Route::get('/product-trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/product/{id}/forceDelete', [ProductController::class, 'forceDelete'])->name('product.forceDelete');
    Route::post('/selectedDelete', [ProductController::class,'selectedDelete'])->name('product.seletedDelete');

    //shopping
    Route::resource('/order', OrderController::class);
    Route::get('/order/{id}/detail',[OrderController::class, 'show'])->name('order.detail');

});

// ========================================================================================================================================

//front end

//home
Route::get('/', [HomeController::class, 'index'])->name('index');

//list

Route::get('/listPN/{id}', [CateController::class, 'listPN'])->name('listPN.index');

//detail
Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');

//login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

//register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister']);

//logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart-update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart-delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/addDb',[CartController::class,'addDb'])->name('carts.addDb');

//checkout
Route::get('/checkout', [OlderController::class, 'checkout'])->name('checkout');
Route::post('/postcheckout', [OlderController::class, 'postcheckout'])->name('post.checkout');
Route::get('/checkoutSuccess',[OlderController::class, 'checkoutSuccess'])->name('checkout.checkoutSuccess');