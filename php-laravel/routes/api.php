<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteApiController;
use App\Http\Controllers\LivroApiController;
use App\Http\Controllers\DocumentController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aqui é registrado as rotas que utilizarão dados do backend (laravel) e BD
| Dentro das views em VUEJS existem apontamentos para estas rotas!
|
*/

Route::get('livros', [LivroApiController::class, 'index']);
Route::get('livros/get/{id}', [LivroApiController::class, 'get']);
Route::post('livros/update/{id}', [LivroApiController::class, 'update']);
Route::post('livros/store', [LivroApiController::class, 'store']);
Route::delete('/livros/{id}', [LivroApiController::class, 'destroy']);
Route::post('livros/print/{id}', [LivroApiController::class, 'print']);

Route::get('clientes',[ClienteApiController::class, 'index'] );
Route::post('clientes/store', [ClienteApiController::class, 'store']);
Route::get('clientes/get/{id}', [ClienteApiController::class, 'get']);
Route::post('clientes/update/{id}', [ClienteApiController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteApiController::class, 'destroy']);

Route::get('/documents', [DocumentController::class, 'index'])->name('document');
Route::post('/documents/upload', [DocumentController::class, 'update'])->name('document.update');
Route::get('/documents/download/{documentId}', [DocumentController::class, 'download'])->name('document.download');
Route::get('/documents/delete/{documentId}', [DocumentController::class, 'destroy'])->name('document.destroy');
