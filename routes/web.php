<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/nextStep', [App\Http\Controllers\CapitalController::class, 'saveRef'])->name('saveRef');
Route::post('/updateRefLink', [App\Http\Controllers\HomeController::class, 'updateRefLink'])->name('updateRefLink');
Route::post('/updateBanner', [App\Http\Controllers\HomeController::class, 'updateBanner'])->name('updateBanner');
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('user.settings');
    Route::get('/media', [App\Http\Controllers\HomeController::class, 'media'])->name('user.media');
    Route::get('/referrals', [App\Http\Controllers\HomeController::class, 'referrals'])->name('user.referrals');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/users/{user}/toggle-admin', [App\Http\Controllers\AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::get('/users/{user}/referrals', [App\Http\Controllers\AdminController::class, 'userReferrals'])->name('user-referrals');
    Route::get('/all-referred-users', [App\Http\Controllers\AdminController::class, 'allReferredUsers'])->name('all-referred-users');
    Route::any('/delete-referred-user/{id}', [App\Http\Controllers\AdminController::class, 'deleteReferredUser'])->name('delete-referred-user');
    Route::post('/banner', [App\Http\Controllers\AdminController::class, 'updateBanner'])->name('banner.update');
    Route::get('/users/{user}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edit');
    Route::post('/users/{user}/update', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
    Route::post('/users/{user}/update-banner', [App\Http\Controllers\AdminController::class, 'updateUserBanner'])->name('users.update-banner');

});
Route::get('/{slug}', [App\Http\Controllers\CapitalController::class, 'refer_page'])->name('refer_page');

Route::get('/nextstep/{slug}', [App\Http\Controllers\CapitalController::class, 'nextStep'])->name('nextStep');
