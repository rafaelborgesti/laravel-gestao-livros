@extends('adminlte::page')

@section('title', 'Livro detalhes')

@section('content_header')
    <h1>Livro detalhes: {{ $livro->nome }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('livros.index') }}">Livros</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @if ($livro->imagem_capa)
        <div class="form-row align-items-center">
            <div class="form-group col-md-12">
            @if ($livro->imagem_capa)
                <img class="img-thumbnail" src="{{ url('/').'/images/'.$livro->imagem_capa }}">
            @endif
            </div>
        </div>
        @endif

        <p><strong>Título: </strong>{{ $livro->titulo }}</p>
        <p><strong>ISBN: </strong>{{ $livro->isbn }}</p>
        <p><strong>Categoria: </strong>{{ $livro->categoria->nome }}</p>
        <p><strong>Descrição: </strong>{{ $livro->descricao }}</p>
        <p><strong>Editora: </strong>{{ $livro->editora }}</p>
        <p><strong>Data publicação: </strong>{{ \Carbon\Carbon::parse($livro->ano_publicacao)->format('d/m/Y')}}</p>
        <p><strong>Quantidade páginas: </strong>{{ $livro->quantidade_paginas }}</p>
        <p><strong>Preço: </strong>{{ $livro->preco }}</p>
        <p><strong>Data cadastro: </strong>{{ \Carbon\Carbon::parse($livro->created_at)->format('d/m/Y')}}</p>
        
        <hr>

        <form action="{{ route('livros.destroy',$livro->uuid) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger" value="Deletar">
        </form>
        
    </div>
</div>
<!-- /.card -->

@stop



