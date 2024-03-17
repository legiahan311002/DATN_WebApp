<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\SellerController;
use App\Http\Controllers\Buyer\ProfileSellerController;

use App\Http\Controllers\Buyer\HomeController;
use App\Http\Controllers\Buyer\ProductController;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\OrderController;
use App\Http\Controllers\Buyer\PaymentController;
use App\Http\Controllers\Buyer\UserProfileController;

use App\Http\Controllers\Seller\CategoryChildController;
use App\Http\Controllers\Seller\InfoShopController;
use App\Http\Controllers\Seller\VoucherController;
use App\Http\Controllers\Seller\SellerProductController;

use App\Http\Controllers\Admin\ApproveController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VoucherAdminController;
use App\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Http\Controllers\Admin\DashboardAdminController;

Route::get('/', [HomeController::class, 'index'])->name('buyer.home');

Route::get('/product', [ProductController::class, 'product'])->name('buyer.product');
Route::post('/product', [ProductController::class, 'search'])->name('buyer.product.search');
Route::post('/product_sort', [ProductController::class, 'sort'])->name('buyer.product.sort');
Route::post('/product_price', [ProductController::class, 'priceFilter'])->name('buyer.product.price');
Route::get('/', [HomeController::class, 'index'])->name('buyer.home');

Route::post('/buyer/login', [AuthController::class, 'login'])->name('login');
Route::post('/buyer/register', [AuthController::class, 'register'])->name('register');
Route::get('/buyer/login', function () {
    return view('auth.buyer.login');
})->name('buyer.login');

Route::get('/buyer/register', function () {
    return view('auth.buyer.register');
})->name('buyer.register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');

Route::get('/verify-email', function () {
    return view('emails.verify-email');
})->name('verify.email.custom');

Route::get('/email/verify/{token}', [SellerController::class, 'verifyEmail'])->name('verify.email');
Route::get('/verify-email2', function () {
    return view('emails.vertify-email2');
})->name('verify.email.custom2');



//seller
Route::middleware(['SellerMiddleware'])->group(function () {
    Route::prefix('seller1')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('seller');

        Route::controller(VoucherController::class)->group(function () {
            Route::prefix('vouchers')->group(function () {
                Route::get('list', 'index');
                Route::get('create', 'create');
                Route::post('create', 'store');
                Route::get('update/{id}', 'edit');
                Route::post('update/{id}', 'update');
                Route::delete('delete/{id}', 'destroy');
            });
        });

        Route::controller(CategoryChildController::class)->group(function () {
            Route::prefix('categories-child')->group(function () {
                Route::get('list', 'index');
                Route::get('create', 'create');
                Route::post('create', 'store');
                Route::get('update/{id}', 'edit');
                Route::post('update/{id}', 'update');
                Route::delete('delete/{id}', 'destroy');
            });
        });

        Route::controller(CategoryChildController::class)->group(function () {
            Route::prefix('categories-child')->group(function () {
                Route::get('list', 'index');
                Route::get('create', 'create');
                Route::post('create', 'store');
                Route::get('update/{id}', 'edit');
                Route::post('update/{id}', 'update');
                Route::delete('delete/{id}', 'destroy');
            });
        });
        Route::controller(InfoShopController::class)->group(function () {
            Route::prefix('infos')->group(function () {
                Route::get('info', 'index');
                Route::get('update/{id}', 'edit');
                Route::post('update/{id}', 'update');
            });
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::prefix('products')->group(function () {
                Route::get('list', 'index');
                Route::get('create', 'create');
                Route::post('create', 'store');
            });
        });

        Route::controller(SellerOrderController::class)->group(function () {
            Route::prefix('orders')->group(function () {
                Route::get('list', 'index');
                Route::post('confirm/{id}', 'confirm');
                Route::post('pickup/{id}', 'pickup');
                Route::get('detail/{id}', 'show');
            });
        });
    });
    Route::get('/seller/confirm', function () {
        return view('auth.seller.confirm'); 
    })->name('auth.seller.confirm');
    
    Route::get('/create-shop', [SellerController::class, 'create'])->name('create.shop');
});

//
Route::get('/profile-seller', [ProfileSellerController::class, 'getInfoShop'])->name('profile-seller');
Route::get('/product_detail', [ProductController::class, 'productDetail'])->name('buyer.productDetail');


//seller-register/login
Route::get('/seller/register', function () {
    return view('auth.seller.register');
})->name('seller.register');

Route::post('/seller/login', [SellerController::class, 'login'])->name('login');
Route::post('/seller/register', [SellerController::class, 'register'])->name('register');
Route::get('/seller/login', function () {
    return view('auth.seller.login');
})->name('seller.login');
//seller-logout
Route::get('/logout', [SellerController::class, 'logout'])->name('logout');
Route::get('/product_detail', [ProductController::class, 'productDetail'])->name('buyer.productDetail');
Route::get('/cart', function () {
    return view('buyer.cart.index');
})->name('buyer.cart');


Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/order-product', [OrderController::class, 'ProcessOrder'])->name('client.order.processOrder');

Route::middleware(['Buyer.middleware'])->group(function () {
    //  Route Cart

    Route::get('/cart', [CartController::class, 'index'])->name('client.cart.index');

    Route::delete('/remove-cart-item/{id}', [CartController::class, 'removeCartItem'])->name('remove.cart.item');

    Route::post('/update-cart-item/{id}', [CartController::class, 'updateCartItem'])->name('update.cart.item');

    //  Route Order Product
    Route::get('/order-product', function () {
        return view('buyer.order.orderProduct');
    });

    Route::post('/order-product', [OrderController::class, 'ProcessOrder'])->name('client.order.processOrder');
    Route::post('/voucherShop', [OrderController::class, 'voucherShop'])->name('order.voucher_shop');
    Route::post('/voucherSEASIDE', [OrderController::class, 'voucherSEASIDE'])->name('order.voucher_SEASIDE');


    // routes/web.php
    Route::post('/saveOrder', [OrderController::class, 'SaveOrder'])->name('saveOrder');


    Route::get('/saveOrderOnline', [OrderController::class, 'saveOrderOnline'])->name('saveOrderOnline');

    Route::post('/vnpay_payment', [PaymentController::class, 'vnpayPayment'])->name('vnpay.payment');

    Route::post('/paypal_payment', [PaymentController::class, 'pay'])->name('paypal.payment');

    Route::get('/success', [PaymentController::class, 'success'])->name('success');

    Route::get('/error', [PaymentController::class, 'error']);


    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('profile');

    Route::get('/password', [UserProfileController::class, 'showPassword'])->name('password');

    Route::get('/view', [UserProfileController::class, 'showView'])->name('view');

    Route::get('/settings', [UserProfileController::class, 'showSettings']);

    Route::get('/address', [UserProfileController::class, 'showAddress'])->name('buyer.address.create');
    
    Route::post('/add-address', [UserProfileController::class, 'addAddress'])->name('add.address');

    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');

    Route::post('/profile/update-password', [UserProfileController::class, 'updatePassword'])->name('update.password');

    Route::post('/confirm-received/{id}', [UserProfileController::class, 'confirmReceived'])->name('confirm.received');

    Route::post('/submit-review/{orderId}', [UserProfileController::class, 'submitReview'])->name('submit.review');


});


//Admin
Route::get('/admin/login', function () {
    return view('auth.admin.login');
})->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['AdminMiddleware'])->group(function () {
    Route::prefix('')->group(function () {
    
        Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.home');
        Route::get('/admin/approve', [ApproveController::class, 'index'])->name('admin.approve');
        Route::post('/admin/approve/{username}', [ApproveController::class, 'update'])->name('admin.approve.update');
    });

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    Route::get('/admin/addCategory', function () {
        return view('admin.category.add');
    })->name('admin.addCategory');
    Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('/admin/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/admin/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');

    Route::get('/admin/vouchers/list', [VoucherAdminController::class, 'index']);
    Route::get('/admin/vouchers/create', function () {
        return view('admin.voucher.create');
    })->name('admin.addVoucher');

    Route::post('/voucher/store', [VoucherAdminController::class, 'store'])->name('admin.voucher.store');
    Route::delete('/admin/vouchers/delete/{id}', [VoucherAdminController::class, 'destroy'])->name('admin.vouchers.delete');
    Route::get('/admin/vouchers/update/{id}', [VoucherAdminController::class, 'edit'])->name('admin.editVouchers');
    Route::post('/admin/vouchers/{id}', [VoucherAdminController::class, 'update'])->name('admin.updateVouchers');

    Route::get('/admin/approve', [ApproveController::class, 'index'])->name('admin.approve');
    Route::post('/admin/approve/{username}', [ApproveController::class, 'update'])->name('admin.approve.update');
Route::post('/voucher/store', [VoucherAdminController::class, 'store'])->name('admin.voucher.store');
Route::delete('/admin/vouchers/delete/{id}', [VoucherAdminController::class, 'destroy'])->name('admin.vouchers.delete');
Route::get('/admin/vouchers/update/{id}', [VoucherAdminController::class, 'edit'])->name('admin.editVouchers');
Route::post('/admin/vouchers/{id}', [VoucherAdminController::class, 'update'])->name('admin.updateVouchers');
});


Route::post('/store-shop', [SellerController::class, 'store'])->name('shop.store');
Route::get('/changeChannel', [SellerController::class, 'changeChannel'])->name('seller.changeChannel');
