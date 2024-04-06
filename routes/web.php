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
        Route::get('/', [ContactController::class, 'list'])->name('index');
    });

Route::name('dashboard.')
    ->prefix('dashboard')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/contacts', [ContactController::class, 'store'])->name('store');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::patch('/contacts/{contact}/edit/update', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('destroy');


});

Route::fallback(function () {
    return redirect()->route('dashboard.index');
});
