<?php

use App\Http\Controllers\PostControlller;
use App\Http\Controllers\welcomeController;
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

Route::get('/', [welcomeController::class, 'showWelcome'])->name('inicio.welcome');
Route::get('/nosotros',[welcomeController::class,'showNosotros'])->name('inicio.nosotros');
Route::get('/blog',[welcomeController::class,'showNoticias'])->name('inicio.noticias');
Route::get('/equipamiento',[welcomeController::class,'showEquipamiento'])->name('inicio.equipamiento');
Route::get('/cursos',[welcomeController::class,'showCursos'])->name('inicio.cursos');
Route::get('/egresados',[welcomeController::class,'showEgresados'])->name('inicio.egresados');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('posts', PostControlller::class)->except('show');
});
