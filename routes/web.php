<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Public site
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/events/{event:slug}', [FrontendController::class, 'showEvent'])->name('events.show');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'submitContact'])->name('contact.submit');

// Admin auth
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin area
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);
    Route::resource('gallery', GalleryController::class)->except(['show']);
    Route::resource('team', TeamController::class)->except(['show']);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});
