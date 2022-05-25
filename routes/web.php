<?php

use Illuminate\Support\Facades\Route;

use App\Http\controllers\PublicController;
use App\Http\controllers\Admincontroller;

Route::get('/home',[PublicController::class,'index'])->name('home');
Route::get('/category/{cat_id?}',[PublicController::class,'index'])->name('filter');
Route::get('/view/{p_id}',[PublicController::class,'viewProduct'])->name('viewProduct');
Route::get('/cart',[PublicController::class,'cart'])->name('cart');
Route::get('/checkout',[PublicController::class,'checkout'])->name('checkout');

// cart
Route::get("/add-to-cart/{p_id}",[PublicController::class,"addToCart"])->middleware(['auth'])->name("addToCart");
Route::get("/remove-to-cart/{p_id}",[PublicController::class,"removeFromCart"])->name("removeFromCart");
Route::get("/delete-item-from-cart/{p_id}",[PublicController::class,"removeItemFromCart"])->name("removeItemFromCart");
Route::get("/payment/order",[PublicController::class,"order"]);
Route::post("payment/call-back",[PublicController::class,"paymentCallback"]);

// Route::get('/payment/order',[PublicC])
Route::prefix('admin')->group(function(){
    Route::get('/',[Admincontroller::class , 'index'])->name('admin_home');
    Route::get('/manage_order',[Admincontroller::class , 'order'])->name('manage_order');
    Route::resources([
        'product'=>App\Http\controllers\ProductController::class,
        'payment'=>App\Http\controllers\PaymentController::class,
        'category'=>App\Http\controllers\CategoryController::class,
        'coupon'=>App\Http\controllers\CouponsController::class,
        'brand'=>App\Http\controllers\BrandController::class,
        'address'=>App\Http\controllers\AddressController::class,
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
