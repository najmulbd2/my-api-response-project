<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::prefix('users')->group(function (){
    //User all routes
    Route::get('view', [UserController::class, 'ViewUser'])->name('view.user');
    Route::get('add', [UserController::class, 'AddUser'])->name('add.user');
    Route::post('store', [UserController::class, 'StoreUser'])->name('store.user');
    Route::get('edit/{user_id}', [UserController::class, 'EditUser'])->name('edit.user');
    Route::post('update/{user_id}', [UserController::class, 'UpdateUser'])->name('update.user');
    Route::get('delete/{user_id}', [UserController::class, 'DeleteUser'])->name('delete.user');
});

Route::prefix('contact')->group(function (){
    // Contact all routes
    Route::get('view', [ContactController::class, 'ViewContact'])->name('view.contact');
    Route::get('add', [ContactController::class, 'AddContact'])->name('add.contact');
    Route::post('store', [ContactController::class, 'StoreContact'])->name('store.contact');
    Route::get('edit/{id}', [ContactController::class, 'EditContact'])->name('edit.contact');
    Route::post('update/{id}', [ContactController::class, 'UpdateContact'])->name('update.contact');
    Route::get('delete/{id}', [ContactController::class, 'DeleteContact'])->name('delete.contact');
});


Route::prefix('my')->group(function (){
    // Contact all routes
    Route::get('view', [AdminController::class, 'ViewInfo'])->name('view.info');
    Route::get('add', [AdminController::class, 'AddInfo'])->name('add.info');
    Route::post('store', [AdminController::class, 'StoreInfo'])->name('store.info');
//    Route::get('edit/{id}', [AdminController::class, 'EditContact'])->name('edit.contact');
//    Route::post('update/{id}', [AdminController::class, 'UpdateContact'])->name('update.contact');
//    Route::get('delete/{id}', [AdminController::class, 'DeleteContact'])->name('delete.contact');
});

//'www.google.com/product/add'
Route::prefix('product')->group(function (){
    Route::get('view', [ProductController::class, 'ViewProduct'])->name('view.product');
    Route::get('add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('store', [ProductController::class, 'StoreProduct'])->name('store.product');
    Route::get('edit/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
    Route::post('update/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
    Route::get('delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
});

Route::prefix('food')->group(function (){
   Route::get('view',[FoodController::class, 'ViewFood'])->name('view.food');
   Route::get('add',[FoodController::class, 'AddFood'])->name('add.food');
   Route::post('store',[FoodController::class, 'StoreFood'])->name('store.food');
   Route::get('edit/{id}',[FoodController::class, 'EditFood'])->name('edit.food');
   Route::post('update/{id}',[FoodController::class, 'UpdateFood'])->name('update.food');

});



