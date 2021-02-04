@extends('adminlte::page')

@section('title', 'Listagem de Categorias')

@section('content_header')
    
    <h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Adicionar</a>
        Categorias
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Categorias</li>
    </ol>
@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col" width="150px" >Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nome }}</td>
                    <td>
                        <a href="{{ route('categorias.edit',$categoria->uuid) }}" class="btn-sm btn btn-primary">editar</a>
                        <a href="{{ route('categorias.show',$categoria->uuid) }}" class="btn-sm btn btn-info">detalhes</i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<!-- /.card -->

@stop



