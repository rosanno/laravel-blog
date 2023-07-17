<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/blogs', [BlogController::class, 'index'])->name("blogs");
Route::get('blog/create', [BlogController::class, 'create'])->middleware(['auth', 'verified'])->name('blog.create');
Route::get('blog/{blogId}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [BlogController::class, 'showUserBlogs'])->name("/");
    Route::post('blog/create', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/edit/{blogId}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/update/{blogId}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/delete/{blogId}', [BlogController::class, 'delete'])->name('blog.delete');
});

require __DIR__.'/auth.php';
