<?php

use App\Http\Controllers\Dashboard\BrendController;
use App\Http\Controllers\Dashboard\FeedbackController as DashboardFeedbackController;
use App\Http\Controllers\Dashboard\KorzinaController;
use App\Http\Controllers\Dashboard\LocationController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\WordController;
use App\Http\Controllers\Front\FeedbackController;
use App\Http\Controllers\Front\OrdersController;
use App\Http\Controllers\Front\SuccessController;
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


Route::get('/languages/{loc}', function ($loc) {
        if (in_array($loc, ['en', 'ru', 'uz'])) {
            session()->put('locale', $loc);
        }
        return redirect()->back();
    });

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/load/more', [WelcomeController::class, 'load_more']);
Route::get('/load/button', [WelcomeController::class, 'button']);

Route::get('/product-single/{id}', [WelcomeController::class, 'show'])->name('product.shows');
Route::get('/feedback/store', [FeedbackController::class, 'store']);
Route::get('/feedback/contact', [FeedbackController::class, 'store']);
Route::resource('/orders', OrdersController::class);
Route::resource('/success', SuccessController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dashboard/product', ProductController::class);
Route::resource('dashboard/brend', BrendController::class);
Route::resource('dashboard/location', LocationController::class);
Route::resource('dashboard/feedback', DashboardFeedbackController::class);
Route::resource('dashboard/korzina', KorzinaController::class);
Route::resource('dashboard/words', WordController::class);

// Route::get('dashboard/feedback', [DashboardFeedbackController::class, 'index'])->name('feedback.index');

require __DIR__.'/auth.php';