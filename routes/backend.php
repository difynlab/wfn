<?php

use App\Http\Controllers\Backend\Article\ArticleCategoryController;
use App\Http\Controllers\Backend\Article\ArticleController as ArticleArticleController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\CKEditorController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\Page\AboutController;
use App\Http\Controllers\Backend\Page\ArticleController;
use App\Http\Controllers\Backend\Page\AuthenticationController;
use App\Http\Controllers\Backend\Page\HomepageController;
use App\Http\Controllers\Backend\Page\PageController;
use App\Http\Controllers\Backend\Page\SupportController;
use App\Http\Controllers\Backend\Page\WarehouseController as PageWarehouseController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\StorageTypeController;
use App\Http\Controllers\Backend\TodoController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\WarehouseController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth/backend.php';

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('backend.dashboard');
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CkEditor upload route
        Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    // CkEditor upload route

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

            Route::controller(PageWarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
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
        });
    // Pages routes

    // Users routes
        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('filter', 'filter')->name('filter');
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
        Route::controller(WarehouseController::class)->prefix('warehouses')->name('warehouses.')->group(function() {
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
});