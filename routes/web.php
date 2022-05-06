<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

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


Route::get('/catalog/{category:slug?}', [CatalogController::class, 'catalog'])->name('siteCatalog');
Route::get('/search', [CatalogController::class, 'search'])->name('productSearch');

Route::get('/product/{product:slug}', [CatalogController::class, 'product'])->name('siteProduct');

Route::post('/order/store', [OrderController::class, 'store'])->name('siteOrderStore');

Route::get('/order/wishlist', [OrderController::class, 'wishlist'])->name('siteWishlist');
Route::post('/order/getwishlist', [OrderController::class, 'getWishList'])->name('siteGetWishlist');

Route::post('/order/getbasketlist', [OrderController::class, 'getBasketList'])->name('siteGetBasketList');

Route::get('/account', function () {})->name('siteAccount');

Route::get('/contact', [PageController::class, 'contact'])->name('siteContact');

Route::get('/order/cart', [OrderController::class, 'cart'])->name('siteCart');
Route::middleware('auth')->get('/order/checkout', [OrderController::class, 'checkout'])->name('siteCheckout');

Route::get('/blog', [BlogController::class, 'index'])->name('blogIndex');

Route::get('/', [CatalogController::class, 'index'])->name('index');

// =============

require __DIR__ . '/auth.php';
