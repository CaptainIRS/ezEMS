<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\VenueController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::group('/{edition:year}', function () {
    //     Route::get('/', [EditionController::class, 'show'])->name('edition.show')->scopeBindings();
    //     Route::group('/{category:slug}', function () {
    //         Route::get('/', [CategoryController::class, 'show'])->name('category.show')->scopeBindings();
    //         Route::group('{cluster:slug}', function () {
    //             Route::get('/', [ClusterController::class, 'show'])->name('cluster.show')->scopeBindings();
    //             Route::group('{event:slug}', function () {
    //                 Route::get('/', [EventController::class, 'show'])->name('event.show')->scopeBindings();
    //             });
    //         });
    //     });
    // });
    // Route::prefix('/{edition:year}')->group(function () {
    //     Route::get('/', [EditionController::class, 'show'])->name('edition.show')->scopeBindings();
    //     Route::prefix('/{category:slug}')->group(function () {
    //         Route::get('/', [CategoryController::class, 'show'])->name('category.show')->scopeBindings();
    //         Route::prefix('/{cluster:slug}')->group(function () {
    //             Route::get('/', [ClusterController::class, 'show'])->name('cluster.show')->scopeBindings();
    //             Route::prefix('/{event:slug}')->group(function () {
    //                 Route::get('/', [EventController::class, 'show'])->name('event.show')->scopeBindings();
    //             });
    //         });
    //     });
    // });

    Route::get('/{edition:year}', [EditionController::class, 'show'])->name('edition.show')->scopeBindings();
    Route::get('/{edition:year}/{category:slug}', [CategoryController::class, 'show'])->name('category.show')->scopeBindings();
    Route::get('/{edition:year}/{category:slug}/{cluster:slug}', [ClusterController::class, 'show'])->name('cluster.show')->scopeBindings();
    Route::get('/{edition:year}/{category:slug}/{cluster:slug}/{event:slug}', [EventController::class, 'show'])->name('event.show')->scopeBindings();
    Route::get('/{edition:year}/news', [NewsController::class, 'index'])->name('news.index')->scopeBindings();
    Route::get('/{edition:year}/news/{news:slug}', [NewsController::class, 'show'])->name('news.show')->scopeBindings();
    Route::get('/{edition:year}/sponsors', [SponsorController::class, 'index'])->name('sponsors.index')->scopeBindings();
    Route::get('/venues', [VenueController::class, 'index'])->name('venues.index')->scopeBindings();
    Route::get('/venues/{venue:slug}', [VenueController::class, 'show'])->name('venues.show')->scopeBindings();
});
