<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CommandesController;
use App\Http\Controllers\Admin\FournisseursController;
use App\Http\Controllers\Admin\InterventionsController;
use App\Http\Controllers\Technicien\TechniciensController;
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
    Route::resource('articles', ArticlesController::class)->except("update");
    Route::post('/articles/{id}',[ArticlesController::class, 'update'])->name('articles.update');
    Route::resource('commandes', CommandesController::class);
    Route::resource('fournisseurs', FournisseursController::class);
    Route::post('/fournisseurs/modal',[FournisseursController::class, 'modal'])->name('fournisseurs.modal');
    Route::resource('interventions', InterventionsController::class);
    Route::resource('techniciens', TechniciensController::class);
    Route::resource('outils', \App\Http\Controllers\OutilController::class);
    Route::resource('acquisitionsoutils', \App\Http\Controllers\AcquisitionOutilController::class);
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/report/{id}',[ArticlesController::class,'report'])
        ->name('report');


});


Route::get('pdf',[ArticlesController::class,'pdf'])
    ->name('pdf');
Route::get('view-pdf', [ArticlesController::class,'viewPDf'])->name('viewPDF');



 Route::get('redirects',[ArticlesController::class,'index']);

