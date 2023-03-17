<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivroApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('livros', [LivroApiController::class, 'index']);
Route::get('livros/get/{id}', [LivroApiController::class, 'get']);
Route::post('livros/update/{id}', [LivroApiController::class, 'update']);
Route::post('livros/store', [LivroApiController::class, 'store']);
Route::delete('/livros/{id}', [LivroApiController::class, 'destroy']);