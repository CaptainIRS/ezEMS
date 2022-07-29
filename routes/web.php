<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\VenueController;
use App\Models\Edition;
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
    // TODO: Move this logic to a controller
    $latest_edition = Edition::orderBy('year', 'desc')->first()->year;

    return redirect()->route('edition.show', $latest_edition);
})->name('home');

Route::get('/venues', [VenueController::class, 'index'])->name('venues.index')->scopeBindings();
Route::get('/venues/{venue:slug}', [VenueController::class, 'show'])->name('venues.show')->scopeBindings();
Route::get('/{edition:year}', [EditionController::class, 'show'])->name('edition.show')->scopeBindings();
Route::get('/{edition:year}/news', [NewsController::class, 'index'])->name('news.index')->scopeBindings();
Route::get('/{edition:year}/news/{news:slug}', [NewsController::class, 'show'])->name('news.show')->scopeBindings();
Route::get('/{edition:year}/sponsors', [SponsorController::class, 'index'])->name('sponsors.index')->scopeBindings();
Route::get('/{edition:year}/{category:slug}', [CategoryController::class, 'show'])->name('category.show')->scopeBindings();
Route::get('/{edition:year}/{category:slug}/{cluster:slug}', [ClusterController::class, 'show'])->name('cluster.show')->scopeBindings();
Route::get('/{edition:year}/{category:slug}/{cluster:slug}/{event:slug}', [EventController::class, 'show'])->name('event.show')->scopeBindings();

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
