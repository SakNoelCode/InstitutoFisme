<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\EquipamientoController;
use App\Http\Controllers\PostControlller;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/nosotros', [welcomeController::class, 'showNosotros'])->name('inicio.nosotros');
Route::get('/blog', [welcomeController::class, 'showNoticias'])->name('inicio.noticias');
Route::get('/blog/{post}', [welcomeController::class, 'showDetalleNoticia'])->name('inicio.detalleNoticia');
Route::get('/equipamiento', [welcomeController::class, 'showEquipamiento'])->name('inicio.equipamiento');
Route::get('/cursos', [welcomeController::class, 'showCursos'])->name('inicio.cursos');
Route::get('/cursos/{curso}',[welcomeController::class,'showDetalleCurso'])->name('inicio.detalleCurso');
Route::get('/egresados', [welcomeController::class, 'showEgresados'])->name('inicio.egresados');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('posts', PostControlller::class)->except('show');
        Route::resource('cursos', CursoController::class)->except('show');
        Route::resource('egresados', EgresadoController::class)->except('show');
        Route::resource('equipamientos', EquipamientoController::class)->except('show');
    });
});
