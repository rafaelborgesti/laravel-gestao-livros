@extends('adminlte::page')

@section('title', 'Listagem de livros')

@section('content_header')
    
    <h1>
        <a href="{{ route('livros.create') }}" class="btn btn-success">Adicionar</a>
        Livros
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Livros</li>
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
                    <th scope="col">Livro</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Preço</th>
                    <th scope="col" width="150px" >Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->nome_autor }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>R$ {{ $livro->preco }}</td>
                    <td>
                        <a href="{{ route('livros.edit',$livro->uuid) }}" class="btn-sm btn btn-primary">editar</a>
                        <a href="{{ route('livros.show',$livro->uuid) }}" class="btn-sm btn btn-info">detalhes</i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<!-- /.card -->

@stop



