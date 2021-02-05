@extends('adminlte::page')

@section('title', 'Adicionar capa livro')

@section('content_header')
    <h1>Imagem capa livro</h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('livros.index') }}">Livros</a></li>
        <li class="breadcrumb-item"><a href="{{ route('livros.edit',$livro->uuid) }}">{{ $livro->titulo }}</a></li>
        <li class="breadcrumb-item active">Capa</li>
    </ol>
    
@stop

@section('content')

<div class="card card-outline card-success">
    <!-- /.card-header -->
    <div class="card-body">

        @include('admin.includes.alerts')

        @if ($livro->imagem_capa)

            <form action="{{ route('livro-capa.excluir',$livro->uuid) }}" class="form" method="POST">
                @csrf
                <div class="form-row align-items-center">
                    <div class="form-group col-md-12">
                    @if ($livro->imagem_capa)
                        <img class="img-thumbnail" src="{{ url('/').'/images/'.$livro->imagem_capa }}">
                    @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Deletar" class="btn btn-danger">
                    </div>
                </div>
            </form>

        @else

        <form action="{{ route('livro-capa.adicionar',$livro->uuid) }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row align-items-center">
                <div class="form-group col-md-12">
                    <label for="nome">Categoria</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Enviar" class="btn btn-success">
                </div>
            </div>
        </form>

        @endif

    </div>
</div>
<!-- /.card -->

@stop



