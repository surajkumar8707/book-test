<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LandingPageController, BookTestController};
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\{HomeController, TextController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::controller(LandingPageController::class)->group(function() {
    Route::get('/', 'index')->name('/');
    Route::get('/get-test-data', 'getTestDatatable')->name('get-test-data');
});

Route::group(['prefix' => 'book-test', 'as' => 'book-test.'], function() {
    Route::controller(BookTestController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create/{id}', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(["middleware" => ["guest:admin"]], function () {
        Route::controller(LoginController::class)->group(function() {
            Route::get('/login', 'showAdminLoginForm')->name('login_page');
            Route::post('/login', 'adminLogin')->name('login');
        });
    });
    Route::group(["middleware" => "auth:admin"], function () {
        Route::get("/dashboard", [HomeController::class, "index"])->name("dashboard");
        Route::post('/logout', [LoginController::class, 'adminLogout'])->name('logout');
        //text
        Route::group(['prefix' => 'text', 'as' => 'text.'], function() {
            Route::controller(TextController::class)->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });
        });

        Route::group(['prefix' => 'book-test', 'as' => 'book-test.'], function() {
            Route::controller(BookTestController::class)->group(function() {
                Route::get('/', 'index')->name('index');
                Route::get('/create/{id}', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                // Route::get('/edit/{id}', 'edit')->name('edit');
                // Route::post('/update/{id}', 'update')->name('update');
                // Route::get('/delete/{id}', 'delete')->name('delete');
            });
        });

    });
});
