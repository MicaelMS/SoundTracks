@extends('layouts.app')

@section('title','Registrar album')


@section('content')

    <div class="container mt-5">
    <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Voltar</a>
        <h1>Adicione um novo album</h1>
        <hr>
        <form action="{{ route('albums-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Digite o titulo...">
                </div>
                <br>
                <div class="form-group">
                    <label for="artista">Artista:</label>
                    <input type="text" class="form-control" name="artista" placeholder="Digite o nome do artista...">
                </div>
                <br>
                <div class="form-group">
                    <label for="ano_criacao">Ano de Criação:</label>
                    <input type="number" class="form-control" name="ano_criacao" placeholder="Ano de criação...">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection