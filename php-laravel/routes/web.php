<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\{LivroController};

//Estabelece as rotas passando sempre o método a ser usado


Route::get('/',[LivroController::class, 'index']);

Route::get('/livro/create',[LivroController::class, 'create']);

Route::post('/livro',[LivroController::class, 'store'])->name('livro.store');

Route::get('livro/livros', [LivroController::class, 'getLivros']);

Route::delete('/livro/{id}', [LivroController::class, 'delete'])->name('livro.delete');

Route::get('/livro/edit/{id}', [LivroController::class, 'edit'])->name('livro.edit');

Route::put('/livro/update/{id}', [LivroController::class, 'update'])->name('livro.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
