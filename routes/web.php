<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Book\BookBorrowController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\DonateBookController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\PenaltiesController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\User\UserProfileController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth']);

Route::get('/book/catalog', [BookController::class, 'catalog'])
    ->name('book.catalog')
    ->middleware(['auth']);

Route::resource('book', BookController::class)
    ->except('show')
    ->middleware(['auth']);

Route::resource('donate-book', DonateBookController::class)
    ->except('show')
    ->middleware(['auth']);
    
Route::resource('penalties', PenaltiesController::class)
    ->only(['index', 'show', 'update'])
    ->middleware(['auth']);
    
Route::get('/book-borrow/get-all', [BookBorrowController::class, 'getAll'])
    ->name('book-borrow.get-all')
    ->middleware(['auth']);
    
Route::resource('book-borrow', BookBorrowController::class)
    ->only(['index', 'store', 'destroy'])
    ->middleware(['auth']);
    
Route::resource('profile', UserProfileController::class)
    ->only(['index', 'store', 'update'])
    ->middleware(['auth']);
    
Route::put('/password/{user}', [PasswordController::class, 'update'])
    ->name('password.update')
    ->middleware(['auth']);
  
 

Route::post('/donate-book/{donate_book}/approve', [DonateBookController::class, 'approve'])
    ->name('donate-book.approve')
    ->middleware(['auth', 'admin']);    

Route::resource('user', MemberController::class)
    ->only(['index','create', 'store', 'destroy'])
    ->middleware(['auth', 'admin']);

Route::resource('announcement', AnnouncementController::class)
    ->middleware(['auth', 'admin']);

Route::get('/statistics', [StatisticsController::class, 'index'])
    ->name('statistics.index')
    ->middleware(['auth', 'admin']);



Route::get('/export/{id}/doc', [ExportController::class, 'printBookDesc'])
    ->name('print-book-desc')
    ->middleware(['auth']);

Route::get('/export/pdf', [ExportController::class, 'exportBookPdf'])
    ->name('print-book-pdf')
    ->middleware(['auth']);

Route::get('/export/excel', [ExportController::class, 'exportBookExcel'])
    ->name('print-book-excel')
    ->middleware(['auth']);

require __DIR__.'/auth.php';
