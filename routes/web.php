<?php

use Illuminate\Support\Facades\Route;

use App\Http\controllers\PublicController;
use App\Http\controllers\Admincontroller;

Route::get('/home',[PublicController::class,'index'])->name('home');
Route::get('/view/{p_id}',[PublicController::class,'viewProduct'])->name('view-product');
Route::get('/cart',[PublicController::class,'cart'])->name('cart');
Route::get('/checkout',[PublicController::class,'checkout'])->name('checkout');

Route::prefix('admin')->group(function(){
    Route::get('/',[Admincontroller::class , 'index'])->name('admin_home');
    Route::get('/manage_order',[Admincontroller::class , 'order'])->name('manage_order');
    Route::get('/manage_barand',[Admincontroller::class , 'barand'])->name('manage_barand');
    Route::resources([
        'product'=>App\Http\controllers\ProductController::class,
        'payment'=>App\Http\controllers\PaymentController::class,
        'category'=>App\Http\controllers\CategoryController::class,
        'coupon'=>App\Http\controllers\CouponsController::class,
        'user'=>App\Http\controllers\UserController::class,
        ]);
});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';