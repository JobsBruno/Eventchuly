<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;

/*Route::get('/', function () {
    return view('homeadm');
});*/ 


//Qualquer pagina que você queira VIZUALIZAR use o route::get
Route::get('/',[EventosController::class,'MostrarHome'])->name('homeadm');
Route::get('/altera-evento',[EventosController::class,'MostrarEventoCodigo'])->name('altera-evento');
Route::get('/cadastroevento',[EventosController::class,'MostrarCadastroEvento'])->name('cadastroevento');
Route::get('/listaevento',[EventosController::class,'MostrarEventoNome'])->name('listaevento');

//create
Route::post('/cadastra-evento',[EventosController::class, 'CadastrarEventos'])->name('cadastra-evento');
//delete
Route::delete('/apagaevento', [EventosController::class, 'Destroy'])->name('apagaevento');
//update
Route::put('/alteraevento', [EventosController::class, 'Update'])->name('alteraevento');