@extends('adminlte::page')

@section('title', 'Add new categoriy')

@section('content_header')
    <h1>Adicionar categoria</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active">Adicionar</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        <form action="{{ route('categorias.store') }}" class="form" method="POST">
            @include('admin.categorias._partials.form')
        </form>

    </div>
</div>
<!-- /.card -->

@stop



