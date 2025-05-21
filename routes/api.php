<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgendaApiController;

Route::get('contactos', [AgendaApiController::class, 'apiIndex']);

Route::post('/contactos', [AgendaApiController::class, 'store']);
Route::put('/contactos/{id}', [AgendaApiController::class, 'update']);
Route::delete('/contactos/{id}', [AgendaApiController::class, 'destroy']);