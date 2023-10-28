<?php

use App\Http\Controllers\Division\DivisionController;
use App\Http\Controllers\Items\ItemsController;
use App\Http\Controllers\Items\ItemsDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::resource('item', ItemsController::class)->middleware(['auth', 'verified']);
Route::resource('division', DivisionController::class)->middleware(['auth']);

Route::controller(TransactionController::class)->group(function (){
    Route::get('/transaction', 'index')->name('transaction.index');
    Route::post('/transaction', 'store')->name('transaction.store');
})->middleware(['auth', 'verified']);

Route::get('/search/item', [ItemsDataController::class, 'search'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
