<?php

use App\Http\Controllers\Backend\Admin\Article\ArticleCategoryController;
use App\Http\Controllers\Backend\Admin\Article\ArticleController as ArticleArticleController;
use App\Http\Controllers\Backend\Admin\BookingController;
use App\Http\Controllers\Backend\Admin\FroalaController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\MessageController;
use App\Http\Controllers\Backend\Admin\Page\AboutController;
use App\Http\Controllers\Backend\Admin\Page\ArticleController;
use App\Http\Controllers\Backend\Admin\Page\AuthenticationController;
use App\Http\Controllers\Backend\Admin\Page\CommonController;
use App\Http\Controllers\Backend\Admin\Page\HomepageController;
use App\Http\Controllers\Backend\Admin\Page\PageController;
use App\Http\Controllers\Backend\Admin\Page\PrivacyPolicyController;
use App\Http\Controllers\Backend\Admin\Page\SupportController;
use App\Http\Controllers\Backend\Admin\Page\TermsOfUseController;
use App\Http\Controllers\Backend\Admin\Page\WarehouseController;
use App\Http\Controllers\Backend\Admin\ReportController;
use App\Http\Controllers\Backend\Admin\ReviewController;
use App\Http\Controllers\Backend\Admin\SettingsController;
use App\Http\Controllers\Backend\Admin\StorageTypeController;
use App\Http\Controllers\Backend\Admin\SubscriptionController;
use App\Http\Controllers\Backend\Admin\SupportController as AdminSupportController;
use App\Http\Controllers\Backend\Admin\TodoController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\WarehouseController as AdminWarehouseController;
use App\Http\Controllers\Backend\Landlord\BookingController as LandlordBookingController;
use App\Http\Controllers\Backend\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Backend\Landlord\FavoriteController;
use App\Http\Controllers\Backend\Landlord\MessageController as LandlordMessageController;
use App\Http\Controllers\Backend\Landlord\SettingsController as LandlordSettingsController;
use App\Http\Controllers\Backend\Landlord\TodoController as LandlordTodoController;
use App\Http\Controllers\Backend\Landlord\WarehouseController as LandlordWarehouseController;
use App\Http\Controllers\Backend\Tenant\BookingController as TenantBookingController;
use App\Http\Controllers\Backend\Tenant\DashboardController as TenantDashboardController;
use App\Http\Controllers\Backend\Tenant\FavoriteController as TenantFavoriteController;
use App\Http\Controllers\Backend\Tenant\MessageController as TenantMessageController;
use App\Http\Controllers\Backend\Tenant\SettingsController as TenantSettingsController;
use App\Http\Controllers\Backend\Tenant\TodoController as TenantTodoController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth/backend.php';

// Admin
    Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Froala upload route
            Route::controller(FroalaController::class)->prefix('froala')->name('froala.')->group(function() {
                Route::post('upload', 'upload')->name('upload');
                Route::post('delete', 'delete')->name('delete');
            });
        // Froala upload route

        // Pages routes
            Route::prefix('pages')->name('pages.')->group(function() {
                Route::get('/', [PageController::class, 'index'])->name('index');

                Route::controller(HomepageController::class)->prefix('homepage')->name('homepage.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(AuthenticationController::class)->prefix('authentications')->name('authentications.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(SupportController::class)->prefix('support')->name('support.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(WarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(AboutController::class)->prefix('about')->name('about.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(ArticleController::class)->prefix('articles')->name('articles.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(PrivacyPolicyController::class)->prefix('privacy-policy')->name('privacy-policy.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(TermsOfUseController::class)->prefix('terms-of-use')->name('terms-of-use.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });

                Route::controller(CommonController::class)->prefix('common')->name('common.')->group(function() {
                    Route::get('{language}', 'index')->name('index');
                    Route::post('{language}', 'update')->name('update');
                });
            });
        // Pages routes

        // Users routes
            Route::controller(UserController::class)->prefix('users')->name('users.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('order-by', 'orderBY')->name('order-by');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{user}/edit', 'edit')->name('edit');
                Route::post('{user}', 'update')->name('update');
                Route::delete('{user}', 'destroy')->name('destroy');

                Route::controller(UserController::class)->prefix('company')->name('company.')->group(function() {
                    Route::get('{user}', 'company')->name('index');
                    Route::post('{user}/{company}', 'companyUpdate')->name('update');
                });
            });
        // Users routes

        // Warehouses routes
            Route::controller(AdminWarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{warehouse}/edit', 'edit')->name('edit');
                Route::post('{warehouse}', 'update')->name('update');
                Route::delete('{warehouse}', 'destroy')->name('destroy');
            });
        // Warehouses routes

        // Storage types routes
            Route::controller(StorageTypeController::class)->prefix('storage-types')->name('storage-types.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{storage_type}/edit', 'edit')->name('edit');
                Route::post('{storage_type}', 'update')->name('update');
                Route::delete('{storage_type}', 'destroy')->name('destroy');
            });
        // Storage types routes

        // Bookings routes
            Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{booking}/edit', 'edit')->name('edit');
                Route::post('{booking}', 'update')->name('update');
                Route::delete('{booking}', 'destroy')->name('destroy');
            });
        // Bookings routes

        // Todos routes
            Route::controller(TodoController::class)->prefix('todos')->name('todos.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::post('{todo}/favorite', 'favorite')->name('favorite');
                Route::post('{todo}/complete', 'complete')->name('complete');
                Route::post('{todo}/destroy', 'destroy')->name('destroy');
            });
        // Todos routes

        // Settings routes
            Route::controller(SettingsController::class)->prefix('settings')->name('settings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('{user}/profile', 'profile')->name('profile');
                Route::post('{user}/password', 'password')->name('password');
                Route::post('{setting}/website', 'website')->name('website');
            });
        // Settings routes

        // Messages routes
            Route::controller(MessageController::class)->prefix('messages')->name('messages.')->group(function() {
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{category}', 'index')->name('index');
                Route::get('{category}/filter', 'filter')->name('filter');
                Route::get('{message}/edit', 'edit')->name('edit');
                Route::post('{message}/update', 'update')->name('update');

                Route::post('{message}/favorite', 'favorite')->name('favorite');
                Route::post('favorite/bulk', 'bulkFavorite')->name('bulk-favorite');
                Route::post('destroy/bulk', 'bulkDestroy')->name('bulk-destroy');
                Route::post('recover/bulk', 'bulkRecover')->name('bulk-recover');
            });
        // Messages routes

        // Article categories routes
            Route::controller(ArticleCategoryController::class)->prefix('article-categories')->name('article-categories.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{article_category}/edit', 'edit')->name('edit');
                Route::post('{article_category}', 'update')->name('update');
                Route::delete('{article_category}', 'destroy')->name('destroy');
            });
        // Article categories routes

        // Articles routes
            Route::controller(ArticleArticleController::class)->prefix('articles')->name('articles.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{article}/edit', 'edit')->name('edit');
                Route::post('{article}', 'update')->name('update');
                Route::delete('{article}', 'destroy')->name('destroy');
            });
        // Articles routes

        // Reviews routes
            Route::controller(ReviewController::class)->prefix('reviews')->name('reviews.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{review}/edit', 'edit')->name('edit');
                Route::post('{review}', 'update')->name('update');
                Route::delete('{review}', 'destroy')->name('destroy');
            });
        // Reviews routes

        // Supports routes
            Route::controller(SubscriptionController::class)->prefix('subscriptions')->name('subscriptions.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::delete('{subscription}', 'destroy')->name('destroy');
            });
        // Supports routes

        // Supports routes
            Route::controller(AdminSupportController::class)->prefix('supports')->name('supports.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::delete('{support}', 'destroy')->name('destroy');
            });
        // Supports routes

        // Reports routes
            Route::controller(ReportController::class)->prefix('reports')->name('reports.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('{report}/edit', 'edit')->name('edit');
                Route::post('{report}', 'update')->name('update');
                Route::delete('{report}', 'destroy')->name('destroy');
            });
        // Reports routes
    });
// Admin


// Landlord
    Route::middleware(['auth', 'role:landlord'])->prefix('landlord')->name('landlord.')->group(function () {
        Route::get('dashboard', [LandlordDashboardController::class, 'index'])->name('dashboard');

        // Warehouses routes
            Route::controller(LandlordWarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{warehouse}/edit', 'edit')->name('edit');
                Route::post('{warehouse}', 'update')->name('update');
                Route::delete('{warehouse}', 'destroy')->name('destroy');
            });
        // Warehouses routes

        // Bookings routes
            Route::controller(LandlordBookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('{booking}/edit', 'edit')->name('edit');
                Route::post('{booking}', 'update')->name('update');
                Route::delete('{booking}', 'destroy')->name('destroy');
            });
        // Bookings routes

        // Favorite routes
            Route::controller(FavoriteController::class)->prefix('favorites')->name('favorites.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::delete('{favorite}', 'destroy')->name('destroy');
            });
        // Favorite routes

        // Todos routes
            Route::controller(LandlordTodoController::class)->prefix('todos')->name('todos.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::post('{todo}/favorite', 'favorite')->name('favorite');
                Route::post('{todo}/complete', 'complete')->name('complete');
                Route::post('{todo}/destroy', 'destroy')->name('destroy');
            });
        // Todos routes

        // Settings routes
            Route::controller(LandlordSettingsController::class)->prefix('settings')->name('settings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('{user}/profile', 'profile')->name('profile');
                Route::post('{user}/password', 'password')->name('password');
                Route::post('{user}/company/{company}', 'company')->name('company');
            });
        // Settings routes

        // Messages routes
            Route::controller(LandlordMessageController::class)->prefix('messages')->name('messages.')->group(function() {
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{category}', 'index')->name('index');
                Route::get('{category}/filter', 'filter')->name('filter');
                Route::get('{message}/edit', 'edit')->name('edit');
                Route::post('{message}/update', 'update')->name('update');

                Route::post('{message}/favorite', 'favorite')->name('favorite');
                Route::post('favorite/bulk', 'bulkFavorite')->name('bulk-favorite');
                Route::post('destroy/bulk', 'bulkDestroy')->name('bulk-destroy');
                Route::post('recover/bulk', 'bulkRecover')->name('bulk-recover');
            });
        // Messages routes
    });
// Landlord


// Tenant
    Route::middleware(['auth', 'role:tenant'])->prefix('tenant')->name('tenant.')->group(function () {
        Route::get('dashboard', [TenantDashboardController::class, 'index'])->name('dashboard');

        // Bookings routes
            Route::controller(TenantBookingController::class)->prefix('bookings')->name('bookings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::get('{booking}/edit', 'edit')->name('edit');
                Route::post('{booking}', 'update')->name('update');
                Route::delete('{booking}', 'destroy')->name('destroy');
            });
        // Bookings routes

        // Favorite routes
            Route::controller(TenantFavoriteController::class)->prefix('favorites')->name('favorites.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('filter', 'filter')->name('filter');
                Route::delete('{favorite}', 'destroy')->name('destroy');
            });
        // Favorite routes

        // Todos routes
            Route::controller(TenantTodoController::class)->prefix('todos')->name('todos.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::post('{todo}/favorite', 'favorite')->name('favorite');
                Route::post('{todo}/complete', 'complete')->name('complete');
                Route::post('{todo}/destroy', 'destroy')->name('destroy');
            });
        // Todos routes

        // Settings routes
            Route::controller(TenantSettingsController::class)->prefix('settings')->name('settings.')->group(function() {
                Route::get('/', 'index')->name('index');
                Route::post('{user}/profile', 'profile')->name('profile');
                Route::post('{user}/password', 'password')->name('password');
                Route::post('{user}/company/{company}', 'company')->name('company');
            });
        // Settings routes

        // Messages routes
            Route::controller(TenantMessageController::class)->prefix('messages')->name('messages.')->group(function() {
                Route::get('create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('{category}', 'index')->name('index');
                Route::get('{category}/filter', 'filter')->name('filter');
                Route::get('{message}/edit', 'edit')->name('edit');
                Route::post('{message}/update', 'update')->name('update');

                Route::post('{message}/favorite', 'favorite')->name('favorite');
                Route::post('favorite/bulk', 'bulkFavorite')->name('bulk-favorite');
                Route::post('destroy/bulk', 'bulkDestroy')->name('bulk-destroy');
                Route::post('recover/bulk', 'bulkRecover')->name('bulk-recover');
            });
        // Messages routes
    });
// Tenant