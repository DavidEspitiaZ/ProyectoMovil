<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Detail_PaymentController;
use App\Http\Controllers\Detail_Shopping_CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Payment_MethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Shopping_cartController;
use App\Http\Controllers\Order_DetailController;
use App\Http\Controllers\SecurityAuthController;
use App\Http\Controllers\UsersController;

Route::apiResource('/users', UsersController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('category',[CategoryController::class,'index']);
    Route::get('category/{id}',[CategoryController::class,'show']);
    Route::get('product',[ProductController::class,'index']);
    Route::post('order',[OrderController::class,'store']);
    Route::post('/logout',[SecurityAuthController::class,'logout']);

});
// //RUTAS DE CATEGORY
Route::get('category',[CategoryController::class,'index']);
Route::post('category',[CategoryController::class,'store']);
Route::put('category/{id}',[CategoryController::class,'update']);
Route::get('category/{id}',[CategoryController::class,'show']);
Route::delete('category/{id}',[CategoryController::class,'destroy']);

//RUTAS DE DETAIL PAYMENT
Route::get('detail_payment',[Detail_PaymentController::class,'index']);
Route::post('detail_payment',[Detail_PaymentController::class,'store']);
Route::put('detail_payment/{id}',[Detail_PaymentController::class,'update']);
Route::get('detail_payment/{id}',[Detail_PaymentController::class,'show']);
Route::delete('detail_payment/{id}',[Detail_PaymentController::class,'destroy']);

//RUTAS DE SHOPPING CART
Route::get('detail_shopping_cart',[Detail_Shopping_CartController::class,'index']);
Route::post('detail_shopping_cart',[Detail_Shopping_CartController::class,'store']);
Route::put('detail_shopping_cart/{id}',[Detail_Shopping_CartController::class,'update']);
Route::get('detail_shopping_cart/{id}',[Detail_Shopping_CartController::class,'show']);
Route::delete('detail_shopping_cart/{id}',[Detail_Shopping_CartController::class,'destroy']);

//RUTAS DE ORDER DETAIL
Route::get('order_detail',[Order_DetailController::class,'index']);
Route::post('order_detail',[Order_DetailController::class,'store']);
Route::put('order_detail/{id}',[Order_DetailController::class,'update']);
Route::get('order_detail/{id}',[Order_DetailController::class,'show']);
Route::delete('order_detail/{id}',[Order_DetailController::class,'destroy']);

//RUTAS DE ORDER
Route::get('order',[OrderController::class,'index']);
Route::post('order',[OrderController::class,'store']);
Route::put('order/{id}',[OrderController::class,'update']);
Route::get('order/{id}',[OrderController::class,'show']);
Route::delete('order/{id}',[OrderController::class,'destroy']);

//RUTAS DE PAYMENT METHOD
Route::get('payment_method',[Payment_MethodController::class,'index']);
Route::post('payment_method',[Payment_MethodController::class,'store']);
Route::put('payment_method/{id}',[Payment_MethodController::class,'update']);
Route::get('payment_method/{id}',[Payment_MethodController::class,'show']);
Route::delete('payment_method/{id}',[Payment_MethodController::class,'destroy']);

//RUTAS DE PRODUCT
Route::get('product',[ProductController::class,'index']);
Route::post('product',[ProductController::class,'store']);
Route::put('product/{id}',[ProductController::class,'update']);
Route::get('product/{id}',[ProductController::class,'show']);
Route::delete('product/{id}',[ProductController::class,'destroy']);

//RUTAS DE PROFILE
Route::get('profile',[ProfileController::class,'index']);
Route::post('profile',[ProfileController::class,'store']);
Route::put('profile/{id}',[ProfileController::class,'update']);
Route::get('profile/{id}',[ProfileController::class,'show']);
Route::delete('profile/{id}',[ProfileController::class,'destroy']);

//RUTAS DE REVIEWS
Route::get('reviews',[ReviewsController::class,'index']);
Route::post('reviews',[ReviewsController::class,'store']);
Route::put('reviews/{id}',[ReviewsController::class,'update']);
Route::get('reviews/{id}',[ReviewsController::class,'show']);
Route::delete('reviews/{id}',[ReviewsController::class,'destroy']);

//RUTAS DE ROLE
Route::get('role',[RoleController::class,'index']);
Route::post('role',[RoleController::class,'store']);
Route::put('role/{id}',[RoleController::class,'update']);
Route::get('role/{id}',[RoleController::class,'show']);
Route::delete('role/{id}',[RoleController::class,'destroy']);

//RUTAS DE SHOPPING CART
Route::get('shopping_cart',[Shopping_CartController::class,'index']);
Route::post('shopping_cart',[Shopping_CartController::class,'store']);
Route::put('shopping_cart/{id}',[Shopping_CartController::class,'update']);
Route::get('shopping_cart/{id}',[Shopping_CartController::class,'show']);
Route::delete('shopping_cart/{id}',[Shopping_CartController::class,'destroy']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('login', [SecurityAuthController::class, 'login'])->name('login');

