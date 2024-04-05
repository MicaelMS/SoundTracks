@extends('layouts.app')

@section('title','Edição')


@section('content')

    <div class="container mt-5">
    <a href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Voltar</a>
        <h1>Editar a faixa</h1>
        <hr>
        <form action="{{ route('faixas-update', ['id'=>$faixas->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" name="titulo" value="{{ $faixas->titulo }}" placeholder="Digite o titulo...">
                </div>
                <br>
                <div class="form-group">
                    <label for="duracao">Duração:</label>
                    <input type="text" class="form-control" name="artista" value="{{ $faixas->duracao }}" placeholder="Duração:">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                </div>
            </div>
        </form>
        <div class="row">
        <div class="col-sm-10">
            <h2>Faixas do Álbum</h2>
        </div>
        <div class="col-sm-2">
            <a href="{{ route('faixas-create')}}" class="btn btn-success">Adicionar Faixa</a>
        </div>
    </div>
        
        <ul>
            @foreach($faixas->faixas as $faixa)
                <li>{{ $faixa->titulo }} - Duração: {{ $faixa->duracao }}min</li>
            @endforeach
        </ul>
    </div>
@endsection