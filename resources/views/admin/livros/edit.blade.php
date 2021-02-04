@extends('adminlte::page')

@section('title', 'Editar livros')

@section('content_header')
    <h1>Editar livro: {{ $livro->titulo }}</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('livros.index') }}">Livros</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')
        
        <form action="{{ route('livros.update',$livro->uuid) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @include('admin.livros._partials.form')
        </form>
    </div>
</div>
<!-- /.card -->

@stop



