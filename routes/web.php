<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\PenaltiesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Book\ReturnedBookController;
use App\Http\Controllers\Book\DonateBookController;
use App\Http\Controllers\Member\MemberController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('book')
        ->name('book.')
        ->group(function () {
    Route::get('/catalog', [BookController::class, 'catalog'])->name('catalog');
    Route::get('/', [BookController::class, 'index'])->name('index');
});

Route::prefix('user')
        ->name('user.')
        ->group(function () {
    Route::get('/book', [ReturnedBookController::class, 'index'])->name('book');
});

Route::resource('user', MemberController::class);

Route::get('/penalties', [PenaltiesController::class, 'index'])->name('penalties.list');

Route::resource('donate-book', DonateBookController::class);

Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');

require __DIR__.'/auth.php';
