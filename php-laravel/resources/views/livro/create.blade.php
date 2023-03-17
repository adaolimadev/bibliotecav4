@extends('layouts.main')

@section ('tittle', 'Novo Livro')

@section('content')

<div class="container text-white mt-4 p-4 rounded ">

    <h1 class="text-center">Cadastrar Livro</h1>

    <div id="event-create-container" class="col-md-6 offset-md-3">

        <form action="{{route('livro.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Titulo: </label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group mt-3">
                <label for="autor">Autor: </label>
                <input type="text" class="form-control" id="autor" name="autor">
            </div>
            <div class="form-group mt-3">
                <label for="editora">Editora: </label>
                <input type="text" class="form-control" id="editora" name="editora">
            </div>
            <div class="form-group mt-3">
                <label for="ano">Ano: </label>
                <input type="text" class="form-control" id="ano" name="ano">
            </div>
            <div class="form-group mt-3">
                <label for="genero">Genero: </label>
                <input type="text" class="form-control" id="genero" name="genero">
            </div>
            <input type="submit" class="btn btn-primary mt-4" value="Cadastrar">
            <a href="{{url('/')}}" class="btn btn-danger mt-4">Cancelar</a>
        </form>

    </div>    
</div>    
@endsection