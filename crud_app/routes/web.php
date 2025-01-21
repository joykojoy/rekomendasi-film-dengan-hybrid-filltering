<?php

use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserRatingController;
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

// Redirect root URL to login page
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [FilmController::class, 'dashboard'])->name('dashboard');
});

// Admin-specific routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::get('/films/create', [FilmController::class, 'create'])->name('films.create');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::put('/films/{film}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/films/{film}', [FilmController::class, 'show'])->name('films.show');
    Route::post('/films/{film}/rating', [FilmController::class, 'storeRating'])->name('films.rating');
    Route::post('/films/{film}/rate', [UserRatingController::class, 'store'])->name('user.rating');
});

// Public routes
Route::get('/top-picks', [FilmController::class, 'topPicks'])->name('top-picks');
Route::get('/recommendations/{userId}', [RecommendationController::class, 'index'])->name('recommendations');
Route::get('/films/show/{id}', [FilmController::class, 'showfilm'])->name('films.showfilm');

require __DIR__ . '/auth.php';
