<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Book\BookBorrowController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\DonateBookController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\PenaltiesController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\User\UserController;

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

Route::get('/book/catalog', [BookController::class, 'catalog'])->name('book.catalog');

Route::resource('book', BookController::class)->except('show');

Route::post('/donate-book/{donate_book}/approve', [DonateBookController::class, 'approve'])->name('donate-book.approve');
Route::resource('donate-book', DonateBookController::class)->except('show');

Route::resource('user', MemberController::class)
    ->only(['index','create', 'store', 'destroy']);

Route::resource('penalties', PenaltiesController::class)
    ->only(['index', 'show', 'update']);

Route::resource('book-borrow', BookBorrowController::class)
    ->only(['index', 'store', 'destroy']);

Route::resource('announcement', AnnouncementController::class);

// not fix
Route::prefix('user')
->name('user.')
->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
});    



Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

require __DIR__.'/auth.php';
