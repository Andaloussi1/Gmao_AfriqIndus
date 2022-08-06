<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\FournisseursController;


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
    Route::resource('articles', ArticlesController::class);
    Route::resource('commandes', CommandesController::class);
    Route::resource('fournisseurs', FournisseursController::class);
    Route::resource('interventions', InterventionsController::class);
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/report/{id}',[ArticlesController::class,'report'])
        ->name('report');


});


Route::get('pdf',[ArticlesController::class,'pdf'])
    ->name('pdf');
Route::get('view-pdf', [ArticlesController::class,'viewPDf'])->name('viewPDF');


