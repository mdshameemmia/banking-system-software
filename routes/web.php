<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => "auth"], function () {

    ################## User ##########################
    Route::controller(UserController::class)->group(function () {
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user', 'store')->name('user.store');
        Route::get('users', 'index')->name('users.index');
        Route::get('user/{id}', 'edit')->name('user.edit');
        Route::post('user/{id}', 'update')->name('user.update');
        Route::get('user/delete/{id}', 'delete')->name('user.delete');
    });

    ################## Transaction ##########################
    Route::controller(TransactionController::class)->group(function () {
        Route::get('transactions', 'index')->name('transactions.index');

        Route::get('deposit', 'deposit')->name('deposit.index');
        Route::post('deposit', 'depositStore')->name('deposit.store');
        Route::get('deposit/create', 'depositCreate')->name('deposit.create');

        Route::get('withdrawal', 'withdrawal')->name('withdrawal.index');
        Route::post('withdrawal', 'withdrawalStore')->name('withdrawal.store');
        Route::get('withdrawal/create', 'withdrawalCreate')->name('withdrawal.create');

    });



});

require __DIR__.'/auth.php';
