@extends('adminlte::page')

@section('title', 'Adicionar livros')

@section('content_header')
    <h1>Adicionar livros</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('livros.index') }}">Livros</a></li>
        <li class="breadcrumb-item active">Adicionar</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        <form action="{{ route('livros.store') }}" class="form" method="POST">
            @include('admin.livros._partials.form')
        </form>

    </div>
</div>
<!-- /.card -->

@stop



