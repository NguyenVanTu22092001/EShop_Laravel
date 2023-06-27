<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct']);
Route::get('/product-list', [FrontendController::class, 'productlistAjax']);
Route::post('searchproduct', [FrontendController::class, 'searchProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route cart
Route::post('add-to-cart', [CartController::class, 'addProd']);
Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart', [CartController::class, 'viewcart']);
    //checkout
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    //rating star
    Route::post('/add-rating',[RatingController::class, 'add']);
    //review
    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class,'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);
    Route::post('proceed-to-pay', [CheckoutController::class,'razorpaycheck']);
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', 'Admin\FrontendController@index');
//admin-category
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');

    Route::get('edit-category/{id}', 'Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'Admin\CategoryController@update');
    Route::get('delete-category/{id}', 'Admin\CategoryController@destroy');
//admin product
    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-product', 'Admin\ProductController@add');
    Route::post('insert-product', 'Admin\ProductController@insert');
    Route::get('edit-product/{id}', 'Admin\ProductController@edit');
    Route::put('update-product/{id}', 'Admin\ProductController@update');
    Route::get('delete-product/{id}', 'Admin\ProductController@destroy');

//admin order
    Route::get('orders', 'Admin\OrderController@index');
    Route::get('admin/view-order/{id}', 'Admin\OrderController@view');
    Route::put('update-order/{id}', 'Admin\OrderController@update');
    Route::get('order-history', 'Admin\OrderController@orderhistory');
// admin users
    Route::get('users','Admin\DashboardController@users');
    Route::get('view-users/{id}', 'Admin\DashboardController@viewuser');
    Route::get('update-user-admin/{user_id}', 'Admin\DashboardController@updateuser');
});
