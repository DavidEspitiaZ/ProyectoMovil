<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersWebController;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\OrderWebController;
use App\Http\Controllers\ProductWebController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/users', [UsersWebController::class, 'index'])->name('users.index');
//     Route::delete('/users/{user}', [UserWebController::class, 'destroy'])->name('users.destroy');
//     Route::post('/users', [UsersWebController::class, 'store'])->name('users.store');

//     Route::get('/category', [CategoryWebController::class, 'index'])->name('category.index');
//     Route::post('/category', [CategoryWebController::class, 'store'])->name('category.store');
//     Route::delete('/category/{category}', [CategoryWebController::class, 'destroy'])->name('category.destroy');

//     Route::get('/products', [ProductWebController::class, 'index'])->name('products.index');
//     Route::delete('/products/{product}', [ProductWebController::class, 'destroy'])->name('products.destroy');
//     Route::post('/products', [ProductWebController::class, 'store'])->name('products.store');

//     Route::get('/order', [OrderWebController::class, 'index'])->name('order.index');
// });

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [UsersWebController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserWebController::class, 'destroy'])->name('users.destroy');
    Route::post('/users', [UsersWebController::class, 'store'])->name('users.store');

    Route::get('/category', [CategoryWebController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryWebController::class, 'store'])->name('category.store');
    Route::delete('/category/{category}', [CategoryWebController::class, 'destroy'])->name('category.destroy');

    Route::get('/products', [ProductWebController::class, 'index'])->name('products.index');
    Route::delete('/products/{product}', [ProductWebController::class, 'destroy'])->name('products.destroy');
    Route::post('/products', [ProductWebController::class, 'store'])->name('products.store');
    Route::post('/products{product}', [ProductWebController::class, 'update'])->name('products.edit');

    Route::get('/order', [OrderWebController::class, 'index'])->name('order.index');

    Route::get('usersPDF', [UsersWebController::class, 'generarPDF'])->name('users.PDF');
    Route::get('usersExcel', [UsersWebController::class, 'generarExcel'])->name('users.Excel');


    Route::get('ordersPDF', [OrderWebController::class, 'generarPDF'])->name('orders.PDF');
    Route::get('ordersExcel', [OrderWebController::class, 'generarExcel'])->name('orders.Excel');

    
    Route::get('productsPDF', [ProductWebController::class, 'generarPDF'])->name('products.PDF');
    Route::get('productsExcel', [ProductWebController::class, 'generarExcel'])->name('products.Excel');


    Route::get('categoriesPDF', [CategoryWebController::class, 'generarPDF'])->name('categories.PDF');
    Route::get('categoriesExcel', [CategoryWebController::class, 'generarExcel'])->name('categories.Excel');


});


