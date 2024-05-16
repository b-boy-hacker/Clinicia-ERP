<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ConsultaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthController::class,'login']);

//ESPECIALIDADES 
Route::get('getEspecialidades',[ConsultaController::class,'getEspecialidades']);
Route::post('getMedicoToEspecialidad',[ConsultaController::class,'getMedicoToEspecialidad']);
Route::post('getHorarioToMedico',[ConsultaController::class,'getHorarioToMedico']);
Route::post('pay',[ConsultaController::class,'pay']);
Route::post('getConsultas',[ConsultaController::class,'getConsultas']);

