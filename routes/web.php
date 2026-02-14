<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{slug}', [App\Http\Controllers\CapitalController::class, 'refer_page'])->name('refer_page');
Route::post('/nextStep', [App\Http\Controllers\CapitalController::class, 'saveRef'])->name('saveRef');
Route::get('/nextstep/{slug}', [App\Http\Controllers\CapitalController::class, 'nextStep'])->name('nextStep');
Route::post('/updateRefLink', [App\Http\Controllers\HomeController::class, 'updateRefLink'])->name('updateRefLink');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/users/{user}/toggle-admin', [App\Http\Controllers\AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::get('/users/{user}/referrals', [App\Http\Controllers\AdminController::class, 'userReferrals'])->name('user-referrals');
    Route::get('/all-referred-users', [App\Http\Controllers\AdminController::class, 'allReferredUsers'])->name('all-referred-users');
    Route::any('/delete-referred-user/{id}', [App\Http\Controllers\AdminController::class, 'deleteReferredUser'])->name('delete-referred-user');
    Route::post('/banner', [App\Http\Controllers\AdminController::class, 'updateBanner'])->name('banner.update');

});
