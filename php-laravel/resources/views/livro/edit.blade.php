@extends('layouts.main')

@section ('tittle', 'Editar Livro')

@section('content')

<div class="container text-white mt-4 p-4 rounded ">

    <h1 class="text-center">Editar Livro: {{ $livro->id }}</h1>

    <div id="event-create-container" class="col-md-6 offset-md-3">

        <form action="{{route("livro.update", ["id" => $livro->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="title">Titulo: </label>
                <input type="text" class="form-control" name="titulo" value="{{$livro->titulo}}">
            </div>
            <div class="form-group mt-3">
                <label for="title">Autor: </label>
                <input type="text" class="form-control" name="autor" value="{{$livro->autor}}">
            </div>
            <div class="form-group mt-3">
                <label for="title">Editora: </label>
                <input type="text" class="form-control"  name="editora" value="{{$livro->editora}}">
            </div>
            <div class="form-group mt-3">
                <label for="title">Ano: </label>
                <input type="text" class="form-control" name="ano" value="{{$livro->ano}}">
            </div>
            <div class="form-group mt-3">
                <label for="title">Gênero: </label>
                <input type="text" class="form-control" name="genero" value="{{$livro->genero}}">
            </div>
            
            <input type="submit" class="btn btn-primary mt-4" value="Editar">
            <a href="{{url('/livro/livros')}}" class="btn btn-danger mt-4">Cancelar</a>
        </form>

    </div>    
</div>    
@endsection