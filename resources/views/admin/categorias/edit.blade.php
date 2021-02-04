@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
    <h1>Editar categoria: {{ $categoria->nome }}</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')
        
        <form action="{{ route('categorias.update',$categoria->uuid) }}" class="form" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @include('admin.categorias._partials.form')
        </form>
    </div>
</div>
<!-- /.card -->

@stop



