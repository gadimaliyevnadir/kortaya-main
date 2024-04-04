<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\SearchController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\ProductController;
use \App\Http\Controllers\Frontend\SubscriberController;
use \App\Http\Controllers\Frontend\FaqController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\BlogController;
use \App\Http\Controllers\Frontend\BrandController;
use \App\Http\Controllers\Auth\SocialiteController;

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/couponew',function () {
    return view('frontend.pages.profile.couponNew');
})->name('couponew');

Route::middleware(['guest:web'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register-form', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register-form', [AuthController::class, 'register'])->name('register');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('auth/login', [SocialiteController::class, 'googleLogin'])->name('google-login');
Route::get('auth/google/callback', [SocialiteController::class, 'googleCallBack'])->name('google-callback');

// index
Route::get('/', [IndexController::class, 'index'])->name('dashboard');
Route::get('/recent-view', [IndexController::class, 'recentView'])->name('recentView');
Route::post('/recent-view/delete/{product}', [IndexController::class, 'recentViewDelete'])->name('recentViewDelete');

//products
Route::get('/products/{product:slug}', [ProductController::class, 'detail'])->name('product.detail')->middleware('view:product');
Route::post('/products/{product}/popup-date', [ProductController::class, 'popupDate'])->name('product.popupDate');

//blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'detail'])->name('blog.detail');

//brands
Route::get('/brands/{brand:slug}', [BrandController::class, 'detail'])->name('brand.detail');

//contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact-save/request', [ContactController::class, 'contactSendRequest'])->name('contactSendRequest');
Route::post('/review-save/request', [ContactController::class, 'reviewSendRequest'])->name('reviewSendRequest');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/add-basket/products/{product}', [CartController::class, 'addBasket'])->name('addBasket');
Route::post('/delete-basket/products/{product}', [CartController::class, 'deleteItem'])->name('deleteItemBasket');
Route::post('/increment-decrement/products/{product}', [CartController::class, 'incrementDecrementBasket'])->name('incrementDecrementBasket');
Route::post('/increment-decrement-two/products/{product}', [CartController::class, 'incrementDecrementBasketTwo'])->name('incrementDecrementBasketTwo');


//subscribers
Route::post('/subscribe-save/request', [SubscriberController::class, 'subscribeSendRequest'])->name('subscribeSendRequest');

//faqs
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');

//about
Route::get('/about', [AboutController::class, 'about'])->name('about');


Route::get('/search-page', [SearchController::class, 'search'])->name('searchPage');

//auth
Route::middleware(['auth:web'])->group(function () {

    //checkout
    Route::get('/checkout-page', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order-save', [CheckoutController::class, 'save'])->name('order.save');

    //profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');

    Route::get('/profile/create/address', [ProfileController::class, 'profileAddAddresses'])->name('profile.addAddress');
    Route::get('/profile/addresses', [ProfileController::class, 'profileAddresses'])->name('profile.addresses');
    Route::get('/profile/edit/{address}', [ProfileController::class, 'profileAddressesEdit'])->name('profile.profileAddressesEdit');
    Route::post('/profile/update/{address}', [ProfileController::class, 'profileAddressesUpdate'])->name('profileAddressesUpdate');
    Route::post('/new-address', [ProfileController::class, 'newAddress'])->name('newAddress');
    Route::post('/delete-addresses', [ProfileController::class, 'deleteAddress'])->name('deleteAddress');

    Route::match(['get', 'post'], '/order-tracking', [ProfileController::class, 'orderTracking'])->name('orderTracking');

    Route::post('/delete-order/{order}', [ProfileController::class, 'deleteOrder'])->name('deleteOrder');

    //wishlist
    Route::get('/wishlist', [ProfileController::class, 'wishlist'])->name('wishlist');

});
Route::post('/wishlist/{product}', [ProfileController::class, 'like'])->name('like');

Route::match(['post', 'get'], 'checkout/approved', [CheckoutController::class, 'approved'])->name('checkout.approved');
Route::match(['post', 'get'], 'checkout/canceled', [CheckoutController::class, 'canceled'])->name('checkout.canceled');
Route::match(['post', 'get'], 'checkout/declined', [CheckoutController::class, 'declined'])->name('checkout.declined');

//lang
Route::get('lang/{lang}', [LanguageController::class, 'changeLanguage'])->name('lang.switch');

