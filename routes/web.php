<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::view('/videos', 'videos');

Route::view('/images', 'images')
    ->middleware(['auth', 'verified'])
     ->name('images');

Route::view('/photo-detail', 'photo-detail');

Route::view('/contact', 'contact');


Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');
    
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/images/create', [ImageController::class, 'create']);

Route::post('/images', [ImageController::class, 'store']);

Route::get('/{id}', [ImageController::class, 'show'])->name('show');

Route::get('/', [ImageController::class, 'index'])->name('index');

Route::get('/{id}/download', [ImageController::class, 'download'])->name('download');

// Route để xử lý việc tăng số lượt tim khi nhấn vào nút tim
Route::post('/{id}/like', [ImageController::class, 'like'])->name('like');




Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
// Route cho việc đăng nhập và đăng ký được xử lý bởi Laravel Jetstream
// Route để xử lý yêu cầu xóa ảnh
Route::delete('/profile/delete/{id}', [ProfileController::class, 'delete'])->name('delete');