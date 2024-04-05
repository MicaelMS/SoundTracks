@extends('layouts.app')

@section('title', 'Edição')

@section('content')

<div class="container mt-5">
    <h1 class="mt-3">Editar o álbum</h1>
    <hr>
    @if(isset($albums))
    <form action="{{ route('albums-update', ['id'=>$albums->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" value="{{ $albums->titulo }}" placeholder="Digite o título...">
        </div>
        <div class="mb-3">
            <label for="artista" class="form-label">Artista:</label>
            <input type="text" class="form-control" name="artista" value="{{ $albums->artista }}" placeholder="Digite o nome do artista...">
        </div>
        <div class="mb-3">
            <label for="ano_criacao" class="form-label">Ano de Criação:</label>
            <input type="number" class="form-control" name="ano_criacao" value="{{ $albums->ano_criacao }}" placeholder="Ano de criação...">
        </div>
    </form>
    <div class="row d-flex justify-content-between">
        <div class="col-sm-20">
            <h2>Faixas do Álbum</h2>
            <form action="{{ route('faixas-store') }}" method="POST">
                @csrf    
                <input type="hidden" name="album_id" value="{{ $albums->id }}">
                <div class="mb-3 d-flex">
                    <input type="text" class="form-control me-2" name="titulo" placeholder="Digite o título da faixa...">
                    <input type="number" class="form-control me-2" name="duracao" placeholder="Duração">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
        <div class="card col-sm-20">
        <div class="card-header">Faixas
            <a href="{{ route('faixas-search', ['id' => $albums->id]) }}">Pesquisar Faixas</a>
        </div>
            <ul class="list-group list-group-flush">
                @foreach($albums->faixas as $faixa)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $faixa->titulo }}</span>
                    <span></span>
                    <span class="badge bg-secondary">Duração: {{ $faixa->duracao }}min</span>
                    <form action="{{ route('faixas-destroy', ['id'=>$faixa->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
    <div class="d-flex justify-content-end" style="margin-top:50px">
        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-right:20px"><i class="fas fa-arrow-left"></i> Voltar</a>
        <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
    </div>
@endsection
