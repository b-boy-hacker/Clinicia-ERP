<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicioController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'bienvenido']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('redirigir', [AdminController::class, 'redirigir']);
Route::get('inicio', [AdminController::class, 'inicio']);

Route::get('mostrar_usuario', [AdminController::class, 'mostrar_usuario']);
Route::get('/crear_usuario', [AdminController::class, 'crear_usuario']);
Route::post('/crear_nuevo_usuario', [AdminController::class, 'crear_nuevo_usuario']);

Route::get('/mostrar_medico', [AdminController::class, 'mostrar_medico']);
Route::get('/crear_medico', [AdminController::class, 'crear_medico']);
Route::post('/crear', [AdminController::class, 'crear']);
Route::get('/actualizar_medico/{id}', [AdminController::class, 'actualizar_medico']);
Route::put('/confirmar_medico/{id}', [AdminController::class, 'confirmar_medico']);
Route::get('/borrar_medico/{id}', [AdminController::class, 'borrar_medico']);


Route::get('/mostrar_paciente', [AdminController::class, 'mostrar_paciente']);
Route::get('/crear_paciente', [AdminController::class, 'crear_paciente']);
Route::post('/crear_estudiante', [AdminController::class, 'crear_estudiante']);
Route::get('/borrar_paciente/{id}', [AdminController::class, 'borrar_paciente']);
Route::get('/actualizar_paciente/{id}', [AdminController::class, 'actualizar_paciente']);
Route::put('/confirmar_paciente/{id}', [AdminController::class, 'confirmar_paciente']);


// Rutas de recursos para Servicios y ServicioHorarios
Route::resource('index', ServicioController::class);
Route::resource('serviciohorarios', ServicioHorarioController::class);

Route::get('/mostrar_especialidad', [AdminController::class, 'mostrar_especialidad']);
Route::get('/ruta_especialidad', [AdminController::class, 'ruta_especialidad']);
Route::post('/crear_especialidad', [AdminController::class, 'crear_especialidad']);
Route::post('/crear_materia', [AcademicoController::class, 'crear_materia']);
Route::get('/actualizar_materia/{id}', [AcademicoController::class, 'actualizar_materia']);
Route::put('/confirmar_materia/{id}', [AcademicoController::class, 'confirmar_materia']);
Route::get('/borrar_materia/{id}', [AcademicoController::class, 'borrar_materia']);
