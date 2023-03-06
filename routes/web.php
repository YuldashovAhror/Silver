<?php

use App\Http\Controllers\Dashboard\BrendController;
use App\Http\Controllers\Dashboard\FeedbackController as DashboardFeedbackController;
use App\Http\Controllers\Dashboard\LocationController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Front\FeedbackController;
use App\Http\Controllers\Front\OrdersController;
use App\Http\Controllers\Front\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/product-single/{id}', [WelcomeController::class, 'show'])->name('product.shows');
Route::get('/feedback/store', [FeedbackController::class, 'store']);
Route::get('/feedback/contact', [FeedbackController::class, 'store']);
Route::resource('/orders', OrdersController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dashboard/product', ProductController::class);
Route::resource('dashboard/brend', BrendController::class);
Route::resource('dashboard/location', LocationController::class);
Route::resource('dashboard/feedback', DashboardFeedbackController::class);
// Route::get('dashboard/feedback', [DashboardFeedbackController::class, 'index'])->name('feedback.index');

Route::view('/success', 'success');
// Route::view('/product-single', 'front.product.data-single');

require __DIR__.'/auth.php';