<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->middleware(['auth', 'verified', 'user'])
    ->name('index');
Route::view('/videos', 'videos')
    ->middleware(['auth', 'verified', 'user'])
    ->name('videos');
Route::view('/images', 'images')
    ->middleware(['auth', 'verified', 'user'])
    ->name('images');
Route::view('/photo-detail', 'photo-detail')
    ->middleware(['auth', 'verified', 'user'])
    ->name('photo-detail');
Route::view('/contact', 'contact')
    ->middleware(['auth', 'verified', 'user'])
    ->name('contact');

Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/', [ImageController::class, 'index']);
Route::get('/images/create', [ImageController::class, 'create']);
Route::post('/images', [ImageController::class, 'store']);
Route::get('/images/{id}', [ImageController::class, 'show'])->name('images.show');
require __DIR__ . '/auth.php';
