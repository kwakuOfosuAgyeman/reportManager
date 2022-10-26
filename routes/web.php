<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReportController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function() {
    return redirect()->route('user.loginPage');
});


Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function() {
        Route::get('/login', [LoginController::class, 'index'])->name('loginPage');
        Route::post('/login', [LoginController::class, 'userLogin'])->name('login');

    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/home', [UserController::class, 'index'])->name('home');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports');
        Route::get('/addReport', [ReportController::class, 'create'])->name('addReport');
        Route::post('/addReport', [ReportController::class, 'store']);
        Route::get('/editReport/{id}', [ReportController::class, 'edit'])->name('editReport');
        Route::put('/editReport', [ReportController::class, 'updateReport'])->name('updateReport');
        Route::delete('/deleteReport', [ReportController::class, 'deleteReport'])->name('deleteReport');

    });
});

Route::prefix('customer')->name('customer.')->group(function () {
    Route::middleware(['guest:customer'])->group(function() {
        Route::get('/login', [LoginController::class, 'index1'])->name('customerLogin');
        Route::post('/login', [LoginController::class, 'customerLogin'])->name('login');
    });

    Route::middleware(['auth:customer'])->group(function () {
        Route::get('/home', [CustomerController::class, 'index'])->name('home');
        Route::get('/reports', [ReportController::class, ''])->name('customerReport');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function() {
        Route::get('/login', [LoginController::class, 'index2'])->name('adminLogin');
        Route::post('/login', [LoginController::class, 'adminLogin'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');

    });
});


//require __DIR__.'/auth.php';
