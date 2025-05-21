<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
// Route::get('/', function () {
//     return view('Agenda.Aagenda_index');
// });
Route::get('/', [AgendaController::class, 'index']);
// Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');
Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

Route::get('/{any}', function () {
    return view('Agenda.Agenda_index'); // o el nombre de tu vista Blade principal
})->where('any', '.*');
// Route::get('/fetch-agenda', [AgendaController::class, 'fetch']);
// Route::post('/agenda', [AgendaController::class, 'agenda.store']);
// Route::put('/agenda/{id}', [AgendaController::class, 'agenda.update']);
// Route::delete('/agenda/{id}', [AgendaController::class, 'agenda.destroy']);