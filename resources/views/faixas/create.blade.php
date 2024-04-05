@extends('layouts.app')

@section('title','Registrar faixa')


@section('content')

    <div class="container mt-5">
    <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Voltar</a>
        <h1>Adicione uma nova faixa</h1>
        <hr>
        <form action="{{ route('faixas-store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" placeholder="Digite o titulo...">
                </div>
                <br>
                <div class="form-group">
                    <label for="duracao">Duracao:</label>
                    <input type="number" class="form-control" name="duracao" placeholder="Duração...">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection