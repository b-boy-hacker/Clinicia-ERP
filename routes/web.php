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
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::resource('mostrar_usuario', AdminController::class);
Route::get('/crear_usuario', [AdminController::class, 'crear_usuario']);
Route::post('/crear_nuevo_usuario', [AdminController::class, 'crear_nuevo_usuario']);
Route::post('/editar_Usuario/{id}', [AdminController::class, 'editar_Usuario']);
Route::delete('/borrar_Usuario/{id}', [AdminController::class, 'borrar_Usuario']);

Route::get('/mostrar_medico', [AdminController::class, 'mostrar_medico']);
Route::get('/mostrar_paciente', [AdminController::class, 'mostrar_paciente']);

Route::get('/rol', [AdminController::class, 'rol']);
Route::post('/asignar_rol', [AdminController::class, 'asignar_rol']);
Route::post('/editar_UserRol/{id}', [AdminController::class, 'editar_UserRol']);
Route::delete('/borrar_UserRol/{id}', [AdminController::class, 'borrar_UserRol']);

// Rutas de recursos para Servicios y ServicioHorarios
Route::resource('index', ServicioController::class);

Route::get('/mostrar_especialidad', [AdminController::class, 'mostrar_especialidad']);
Route::post('/crear_especialidad', [AdminController::class, 'crear_especialidad']);
Route::post('/editar_especialidad/{id}', [AdminController::class, 'editar_especialidad']);
Route::delete('/borrar_especialidad/{id}', [AdminController::class, 'borrar_especialidad']);

Route::get('/ver_esp_medico', [AdminController::class, 'ver_esp_medico']);
Route::post('/crear_esp_medico', [AdminController::class, 'crear_esp_medico']);
Route::post('/editar_esp_med/{id}', [AdminController::class, 'editar_esp_med']);
Route::post('/borrar_esp_med/{id}', [AdminController::class, 'editar_esp_med']);
Route::delete('/borrar_esp_med/{id}', [AdminController::class, 'borrar_esp_med']);


use App\Http\Controllers\HorarioController;

Route::get('/mi-horario', [HorarioController::class, 'mostrarVista'])->name('horario.mostrarVista');
Route::post('/horario', [HorarioController::class, 'store'])->name('horario.store');
Route::put('/horario/{id}', [HorarioController::class, 'update'])->name('horario.update');
Route::put('/medico-horario/{id}', [HorarioController::class, 'updateMedicoHorario'])->name('medico-horario.updateMedicoHorario');

Route::post('/turno-horario', [HorarioController::class, 'storeTurno'])->name('turno-horario.storeTurno');
Route::post('/store-medico-horario', [HorarioController::class, 'storeMedicoHorario'])->name('medico-horario.storeMedicoHorario');
Route::delete('/destroy/{id}',[HorarioController::class,'destroy'])->name('horario.destroy');
Route::delete('/medico-horario-destroy/{id}',[HorarioController::class,'destroyMedicoHorario'])->name('medico-horario.destroyMedicoHorario');
Route::delete('/destroy-turno/{id}',[HorarioController::class,'destroyTurno'])->name('turno.destroyTurno');

//agregado para las consultas
Route::post('/consultorio-horario', [HorarioController::class, 'storeConsultorio'])->name('consultorio.storeConsultorio');
Route::delete('/destroy-consultorio/{id}',[HorarioController::class,'destroyConsultorio'])->name('consultorio.destroyConsultorio');

Route::get('/obtener-medicos', [AdminController::class, 'obtenerMedicos'])->name('obtener.medicos');
Route::get('/obtener-horarios', [AdminController::class, 'obtenerHorarios'])->name('obtener.horarios');


//obtener lo del cupo : 
Route::post('/medico/cupo', [HorarioController::class, 'showMedicoHorarios']);

Route::get('/ver_farmacia',[AdminController::class,'ver_farmacia']);
Route::get('/mostrar_paciente/pdf', [AdminController::class, 'pdf_paciente'])->name('pdf_paciente');
Route::get('/mostrar_medico/pdf', [AdminController::class, 'pdf'])->name('pdf');


use App\Http\Controllers\CatEquipoMedicoController;
Route::get('/cat-equipo-medico', [CatEquipoMedicoController::class, 'index'])->name('CatEquipoMedico.index');
Route::post('/catequipoM', [CatEquipoMedicoController::class, 'store'])->name('CatEquipoMedico.store');
Route::put('/catequipoM/{id}', [CatEquipoMedicoController::class, 'update'])->name('CatEquipoMedico.update');
Route::delete('/catequipoMdestroy/{id}',[CatEquipoMedicoController::class,'destroy'])->name('CatEquipoMedico.destroy');
//Route::resource('cat-equipo-medico', 'CatEquipoMedicoController');

use App\Http\Controllers\EquipoMedicoController;
Route::get('/equipo-medico', [EquipoMedicoController::class, 'index'])->name('EquipoMedico.index');
Route::post('/equipoM', [EquipoMedicoController::class, 'store'])->name('EquipoMedico.store');
Route::put('/equipoM/{id}', [EquipoMedicoController::class, 'update'])->name('EquipoMedico.update');
Route::delete('/equipoMdestroy/{id}',[EquipoMedicoController::class,'destroy'])->name('EquipoMedico.destroy');

use App\Http\Controllers\EmergenciaController;
Route::get('/sala_emergencia', [EmergenciaController::class, 'sala_emergencia']);
Route::post('/crearSalaEmergencia', [EmergenciaController::class, 'crearSalaEmergencia']);
Route::delete('/borrar_sala/{id}', [EmergenciaController::class, 'borrar_sala']);

Route::get('/categoria_emergencia', [EmergenciaController::class, 'categoria_emergencia']);
Route::post('/crearCategoriaEmergencia', [EmergenciaController::class, 'crearCategoriaEmergencia']);
Route::delete('/borrar_categoria/{id}', [EmergenciaController::class, 'borrar_categoria']);
Route::get('/emergencia', [EmergenciaController::class, 'emergencia']);
Route::post('/crearEmergencia', [EmergenciaController::class, 'crearEmergencia']);
Route::delete('/borrar_emergencia/{id}', [EmergenciaController::class, 'borrar_emergencia']);
Route::post('/editar_sala/{id}', [EmergenciaController::class, 'editar_sala']);
Route::post('/editar_categoria/{id}', [EmergenciaController::class, 'editar_categoria']);
Route::post('/editar_emergencia/{id}', [EmergenciaController::class, 'editar_emergencia']);

use App\Http\Controllers\OfertaController;
Route::get('/ver_oferta', [OfertaController::class, 'ver_oferta']);
Route::post('/crearOferta', [OfertaController::class, 'crearOferta']);
Route::delete('/borrarOferta/{id}', [OfertaController::class, 'borrarOferta']);
Route::post('/editarOferta/{id}', [OfertaController::class, 'editarOferta']);

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

//Route::resource('GestionFarmacia-categoria', CategoriaController::class);
Route::post('GestionFarmacia-categoria',[CategoriaController::class,'store'])->name('GestionFarmacia-categoria.store');
Route::put('GestionFarmacia-categoria/{id}', [CategoriaController::class,'update'])->name('GestionFarmacia-categoria.update');
Route::delete('GestionFarmacia-categoria/{id}',[CategoriaController::class,'destroy'])->name('GestionFarmacia-categoria.destroy');

//Route::resource('GestionFarmacia-proveedor', ProveedorController::class);
Route::post('GestionFarmacia-proveedor',[ProveedorController::class,'store'])->name('GestionFarmacia-proveedor.store');
Route::put('/GestionFarmacia-proveedor/{id}', [ProveedorController::class, 'update'])->name('GestionFarmacia-proveedor.update');
Route::delete('GestionFarmacia-proveedor/{id}',[ProveedorController::class,'destroy'])->name('GestionFarmacia-proveedor.destroy');

//Route::resource('GestionFarmacia', ProductoController::class);
Route::get('GestionFarmacia', [ProductoController::class, 'index'])->name('GestionFarmacia.index');

Route::post('GestionFarmacia-Pro',[ProductoController::class,'store'])->name('GestionFarmacia-Pro.store');
Route::put('/GestionFarmacia-Pro/{id}', [ProductoController::class, 'update'])->name('GestionFarmacia-Pro.update');
Route::delete('GestionFarmacia-Pro/{id}',[ProductoController::class,'destroy'])->name('GestionFarmacia-Pro.destroy');


//Route::resource('GestionFarmacia-pedidos', PedidoController::class);
Route::post('GestionFarmacia-pedidos',[PedidoController::class,'store'])->name('GestionFarmacia-pedidos.store');
Route::put('/GestionFarmacia-pedidos/{id}', [PedidoController::class, 'update'])->name('GestionFarmacia-pedidos.update');
Route::delete('GestionFarmacia-pedidos/{id}',[PedidoController::class,'destroy'])->name('GestionFarmacia-pedidos.destroy');


Route::get('/usuarios/pdf', [AdminController::class, 'generatePDF'])->name('usuarios.pdf');


// routes/web.php
use App\Http\Controllers\FarmaciaController;
Route::get('/farmacia/productos', [FarmaciaController::class, 'productos'])->name('farmacia.productos');

Route::get('pago-T', [FarmaciaController::class, 'pagoTarjeta'])->name('pago-T');
Route::post('/procesar-pago', [FarmaciaController::class, 'procesarPago'])->name('procesar-pago');


use App\Http\Controllers\ConsultaMedicaControlador;
//use App\Http\Controllers\CitaController;

//Route::get('/paciente/recetas', [ConsultaMedicaControlador::class, 'mostrarRecetas'])->name('paciente.recetas');



use App\Http\Controllers\MedicoController;
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
Route::post('/medicos/{id}/estado', [MedicoController::class, 'updateEstado'])->name('medicos.updateEstado');
Route::post('/medicos/{id}/receta', [MedicoController::class, 'storeReceta'])->name('medicos.storeReceta');
Route::post('/medicos/receta/{id}/editar', [MedicoController::class, 'updateReceta'])->name('medicos.updateReceta');
Route::post('/medicos/{id}/laboratorio', [MedicoController::class, 'storeLaboratorio'])->name('medicos.storeLaboratorio');

Route::get('/paciente/laboratorios', [AdminController::class, 'mostrarLaboratorios'])->name('paciente.mostrarLaboratorios');

//use App\Http\Controllers\CitaController;

Route::post('/guardar-cita', [ConsultaMedicaControlador::class, 'guardarCita'])->name('guardar-cita');
Route::get('/obtener-consulta-medica', [ConsultaMedicaControlador::class, 'obtenerConsultaMedica'])->name('obtener-consulta-medica');
Route::delete('/eliminar-horario/{id}', [ConsultaMedicaControlador::class, 'eliminarHorario'])->name('eliminar-horario');
