@extends('layouts.main')

@section ('tittle', 'Lista de Livros')

@section('content')

<div class="container mt-4 text-center " id="container-list">
    <h1 class="text-light">Livros</h1>
    <table class='table table-hover table-dark mt-4' >
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Ano</th>
                <th>Gênero</th>
                <th>Editar / Excluir</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($livros as $livro)
            <tr>
                <td>{{ $livro->id }} </td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->autor }} </td>
                <td>{{ $livro->editora }} </td>
                <td>{{ $livro->ano }}</td>
                <td>{{ $livro->genero }} </td>
                <td class="">
                        <a href="{{route("livro.edit", ["id" => $livro->id])}}" class="btn btn-info"><ion-icon name="create-outline"></ion-icon>Editar </a> 
                        <form action="{{route("livro.delete", ["id" => $livro->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-delete"><ion-icon name="trash-outline"></ion-icon>Excluir</button>
                        </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">Nenhum evento cadastrado!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection