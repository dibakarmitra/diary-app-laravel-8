<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    // Route::resource('/entries', App\Http\Controllers\EntryController::class, [
    //     'only' => [
    //         'index',
    //         'create',
    //         'store',
    //         'edit',
    //         'update',
    //         'destroy',
    //     ],
    //     'name' => [
    //         'index' => 'entries',
    //         'store' => 'entries.store',
    //         'update' => 'entries.update',
    //         'edit' => 'entries.edit',
    //         'destroy' => 'entries.destroy',
    //     ]
    // ]);
    
    Route::resource('entries', App\Http\Controllers\EntryController::class)->except(['show']);
    // ->only('index','create','store','edit','update','destroy');
});
