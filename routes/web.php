<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
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

Route::name('welcome.')
    ->prefix('welcome')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('index');

    });

Route::name('dashboard.')
    ->prefix('dashboard')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('index');


    Route::post('contacts', [ContactController::class, 'store'])->name('store');


});
