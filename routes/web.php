<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CountingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::prefix('p')->group(function () {
    Route::get('{page}', [PagesController::class, 'showPublic'])->name('pages.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('beverages', BeverageController::class);
    Route::resource('members', MemberController::class);
    Route::get('transactions', TransactionController::class)->name('transactions');
    Route::get('counting', [CountingController::class, 'user'])->name('counting.user');
    Route::resource('pages', PagesController::class);
    Route::get('download/users-balance', [PdfController::class, 'usersBalance'])->name('download.pdf.users-balance');
});
