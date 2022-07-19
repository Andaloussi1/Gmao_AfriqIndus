<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
//article
Route::get('/article',[App\Http\Controllers\ArticleController::class,'index'])->name('articles.index');
Route::get('/article/create',[App\Http\Controllers\ArticleController::class,'create'])->name('articles.create');
Route::get('/article/edit',[App\Http\Controllers\ArticleController::class,'edit'])->name('articles.edit');
//intervention
Route::get('/intervention',[App\Http\Controllers\InterventionController::class,'index'])->name('interventions.index');
Route::get('/intervention/create',[App\Http\Controllers\ArticleController::class,'create'])->name('intervention.create');
Route::get('/intervention/edit',[App\Http\Controllers\ArticleController::class,'edit'])->name('intervention.edit');
