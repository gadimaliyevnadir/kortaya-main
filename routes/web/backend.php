<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminLangController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BadgeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DocumentsController;
use App\Http\Controllers\Backend\DotEnvController;
use App\Http\Controllers\Backend\FaqsController;
use App\Http\Controllers\Backend\HomeCatProductController;
use App\Http\Controllers\Backend\HomeCompareController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\LanguageTranslationController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductDayController;
use App\Http\Controllers\Backend\ProductStatusController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RandProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\BlogController;
use \App\Http\Controllers\Backend\OptionGroupController;
use \App\Http\Controllers\Backend\OptionController;
use \App\Http\Controllers\Backend\CampaignController;
use \App\Http\Controllers\Backend\CampaignTypeController;
use \App\Http\Controllers\Backend\CampaignDetailController;
use \App\Http\Controllers\Backend\CampaignBelongController;

Route::fallback(function () {
    return view('backend.errors.404');
});

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login-admin', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login-admin', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::patch('/lang', AdminLangController::class)->name('lang');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'profileForm'])->name('profile.form');
    Route::patch('/profile', [ProfileController::class, 'profile'])->name('profile');

    Route::resource('/admins', AdminController::class)->except('show');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);

    Route::resource('/languages', LanguageController::class)->except('show');
    Route::resource('/settings', SettingController::class);

    // sliders
    Route::resource('/sliders', SliderController::class);

    //banners
    Route::resource('/banners', BannerController::class);

    //categories
    Route::resource('/categories', CategoryController::class);
    Route::post('/categories/getOptions', [CategoryController::class, 'getOptions'])->name('categories.getOptions');
    Route::post('/categories/getSubCategories', [CategoryController::class, 'getSubCategories'])->name('categories.getSubCategories');

    //brands
    Route::resource('/brands', BrandController::class);

    //blogs
    Route::resource('/blogs', BlogController::class);

    // products
    Route::resource('/products', ProductController::class);

    Route::resource('/product-statuses', ProductStatusController::class);

    Route::resource('colors', ColorController::class);

    Route::resource('sizes', SizeController::class);

    Route::resource('types', TypeController::class);

    Route::resource('badges', BadgeController::class);

    Route::get('/product-days/getProducts', [ProductDayController::class, 'getProducts'])->name('product-days.getProducts');
    Route::resource('product-days', ProductDayController::class);

    Route::get('/rand-products/getProducts', [RandProductController::class, 'getProducts'])->name('rand-products.getProducts');
    Route::resource('rand-products', RandProductController::class);

    Route::get('/home-compares/getProducts', [HomeCompareController::class, 'getProducts'])->name('home-compares.getProducts');
    Route::resource('home-compares', HomeCompareController::class);

    Route::resource('home-cat-products', HomeCatProductController::class);

    //campaigns
    Route::resource('campaigns',CampaignController::class);
    Route::resource('campaign_types', CampaignTypeController::class);
    Route::resource('campaign_belongs', CampaignBelongController::class);
    Route::resource('campaign_details', CampaignDetailController::class);
    Route::post('/campaign_details/getProducts',[CampaignDetailController::class,'getProducts'])->name('campaign_details.getProducts');



    //faqs
    Route::resource('/faqs', FaqsController::class);

    //contacts
    Route::resource('/contacts', ContactController::class);

    //subscribers
    Route::resource('/subscribers', SubscriberController::class);

    //orders
    Route::resource('/orders', OrderController::class);

    //options
    Route::resource('/option-groups', OptionGroupController::class);
    Route::get('/options/getOptionGroups', [OptionController::class, 'getOptionGroups'])->name('options.getOptionGroups');
    Route::resource('/options', OptionController::class);


    Route::post('/documents/{document}/delete', [DocumentsController::class, 'deleteDocument'])->name('delete.document');
    Route::post('/documents/{document}/set-main', [DocumentsController::class, 'setMain'])->name('setMain.document');
    Route::post('/documents/{document}/set-order', [DocumentsController::class, 'setOrder'])->name('setOrder.document');

    Route::resource('translations', LanguageTranslationController::class);

    //isDeveloper
    Route::group(['middleware' => 'isDeveloper'], function () {
        Route::resource('permissions', PermissionController::class);

        Route::resource('logs', LogController::class)->only(['index', 'destroy']);
        Route::get('/system', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs.system');

        Route::get('/env', [DotEnvController::class, 'overview'])->name('env.overview');
    });
});


