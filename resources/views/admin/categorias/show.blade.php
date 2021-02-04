@extends('adminlte::page')

@section('title', 'Categoriy details')

@section('content_header')
    <h1>Categoria detalhes: {{ $categoria->nome }}</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        <p><strong>Nome: </strong>{{ $categoria->nome }}</p>
        <p><strong>Data cadastro: </strong>{{ $categoria->created_at }}</p>
        <hr>

        <form action="{{ route('categorias.destroy',$categoria->uuid) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger" value="Deletar">
        </form>
        
    </div>
</div>
<!-- /.card -->

@stop



