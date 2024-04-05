@extends('layouts.app')

@section('title', 'Pesquisa de Faixas')

@section('content')
    <h1>Pesquisa de Faixas - Álbum: {{ $album->titulo }}</h1>

    <form action="{{ route('faixas-search', ['id' => $album->id]) }}" method="GET" style="margin-top: 30px; margin-bottom: 30px" class="d-flex">
        <input type="text" class="form-control" name="search" placeholder="Pesquisar por título">
        <button type="submit" class="btn btn-success">Pesquisar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título da Faixa</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faixas as $faixa)
            <tr>
                <th scope="row">{{ $faixa->id }}</th>
                <td>{{ $faixa->titulo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
