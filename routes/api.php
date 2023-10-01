<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
> GET /api/estudantes - listar estudantes
> POST /api/estudantes - inserir um estudante
> PUT /api/estudantes/{id} - atualizar um estudante
> DELETE /api/estudantes/{id} - apagar um estudante
> GET /api/estudantes/{id} - buscar um estudante
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/estudantes'        ,[ApiController::class, 'getAllEstudantes']);
Route::post('/v1/estudantes'       ,[ApiController::class, 'createEstudante']);
Route::put('/v1/estudantes/{id}'   ,[ApiController::class, 'updateEstudante']);
Route::delete('/v1/estudantes/{id}',[ApiController::class, 'deleteEstudante']);
Route::get('/v1/estudantes/{id}'   ,[ApiController::class, 'getEstudante']);
