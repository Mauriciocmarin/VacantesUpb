<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudianteController;
use App\Models\EstudianteModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// la rutar para la API
Route :: apiResource("empresas",EmpresaController::class);
Route :: get("pagina_empresa",[EmpresaController::class,"paginado"]);
Route :: apiResource("estudiantes",EstudianteController::class);