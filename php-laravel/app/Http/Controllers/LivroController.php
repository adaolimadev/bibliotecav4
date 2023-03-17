<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function create()
    {
        return view('livro.create');
    }

    public function store(Request $req)
    {
        $livro = new Livro();

        $livro->titulo = $req->titulo;
        $livro->autor = $req->autor;
        $livro->editora = $req->editora;
        $livro->ano = $req->ano;
        $livro->genero = $req->genero;

        $livro->save();

        return redirect('/livro/livros');
    }

    public function getLivros()
    {
        $livros = Livro::all();
        return view('livro.livros', ['livros'=>$livros]);
    }

    public function delete($id)
    {
        Livro::findOrFail($id)->delete();
        return redirect('/livro/livros');
    }

    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('livro.edit', ['livro'=> $livro]);
    }

    public function update (Request $req)
    {
        //Livro::findOrFail($req->id)->update($req->all());

        $upLivro = Livro::findOrFail($req->id);

        $upLivro->titulo = $req->get('titulo');
        $upLivro->autor = $req->get('autor');
        $upLivro->editora = $req->get('editora');
        $upLivro->ano = $req->get('ano');
        $upLivro->genero = $req->get('genero');

        $upLivro->save();

        return redirect('/livro/livros');

    }

}
