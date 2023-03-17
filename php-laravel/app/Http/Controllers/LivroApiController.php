<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    public function get(string $id)
    {
        return Livro::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $livro = new Livro();

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->editora = $request->editora;
        $livro->ano = $request->ano;
        $livro->genero = $request->genero;

        $livro->save();

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livro = Livro::findOrFail($id);

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->editora = $request->editora;
        $livro->ano = $request->ano;
        $livro->genero = $request->genero;

        $livro->save();

        return $livro;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Livro::findOrFail($id)->delete();
        return true;
    }
}
