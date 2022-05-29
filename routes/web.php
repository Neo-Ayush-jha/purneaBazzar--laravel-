<?php

use Illuminate\Support\Facades\Route;

use App\Http\controllers\{PublicController,Admincontroller,AddressController};

Route::get('/home',[PublicController::class,'index'])->name('home');
Route::get('/category/{cat_id?}',[PublicController::class,'index'])->name('filter');
Route::get("/product/{p_id}",[PublicController::class,"view"])->name("viewProduct");
Route::get('/view/{p_id}',[PublicController::class,'viewProduct'])->name('viewProduct');
Route::get('/cart',[PublicController::class,'cart'])->name('cart');
Route::get('/checkout',[PublicController::class,'checkout'])->name('checkout');
Route::resource("address",AddressController::class)->only("store");
// cart
Route::get("/add-to-cart/{p_id}",[PublicController::class,"addToCart"])->middleware(['auth'])->name("addToCart");
Route::get("/remove-to-cart/{p_id}",[PublicController::class,"removeFromCart"])->name("removeFromCart");
Route::get("/delete-item-from-cart/{p_id}",[PublicController::class,"removeItemFromCart"])->name("removeItemFromCart");
Route::post("/payment/order",[PublicController::class,"order"])->name("paymentnow");
Route::post("payment/call-back",[PublicController::class,"paymentCallback"])->name("paymentcallback");
Route::post('/payment/process',[PublicController::class,'paymentProcess'])->name('paymentProcess');
// coupon
Route::post("/coupon/apply",[PublicController::class,'applyCoupons'])->name('applyCoupon');
Route::get("/coupon/remove",[PublicController::class,'removeCoupon'])->name('removeCoupon');


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




// Route::get('/', function () {    return view('welcome');});
Route::get('/',[PublicController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
