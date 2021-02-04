@csrf

<div class="form-row align-items-center">

    <div class="form-group col-md-8">
        <label for="nome">Título</label>
        <input type="text" name="titulo" value="{{ $livro->titulo ?? old('titulo') }}" class="form-control <?php echo ($errors->has('titulo')) ? 'is-invalid' : '' ?>" placeholder="Título">
    </div>

    <div class="form-group col-md-4">
        <label for="nome">ISBN</label>
        <input type="text" name="isbn" value="{{ $livro->isbn ?? old('isbn') }}" class="form-control <?php echo ($errors->has('isbn')) ? 'is-invalid' : '' ?>" placeholder="Isbn">
    </div>

    <div class="form-group col-md-12">
        <label for="nome">Descrição</label>
        <textarea name="descricao" class="form-control <?php echo ($errors->has('descricao')) ? 'is-invalid' : '' ?>" cols="2" rows="4">{{ $livro->descricao ?? old('descricao') }}</textarea>
    </div>

    <div class="form-group col-md-5">
        <label for="nome">Nome autor</label>
        <input type="text" name="nome_autor" value="{{ $livro->nome_autor ?? old('nome_autor') }}" class="form-control <?php echo ($errors->has('nome_autor')) ? 'is-invalid' : '' ?>" placeholder="Autor">
    </div>

    <div class="form-group col-md-3">
        <label for="nome">Categoria</label>
        <select name="categoria" class="form-control <?php echo ($errors->has('descricao')) ? 'is-invalid' : '' ?>">
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $key => $categoria)
                <option value="{{ $categoria->id }}" <?php echo ($categoria->id == @$livro->categoria_id) ? "selected" : "" ?>>{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="nome">Preço</label>
        <input type="text" name="preco" value="{{ $livro->preco ?? old('preco') }}" class="form-control <?php echo ($errors->has('preco')) ? 'is-invalid' : '' ?>" placeholder="Preco">
    </div>

    <div class="form-group col-md-2">
        <label for="nome">Quantidade de páginas</label>
        <input type="text" name="quantidade_paginas" value="{{ $livro->quantidade_paginas ?? old('quantidade_paginas') }}" class="form-control <?php echo ($errors->has('quantidade_paginas')) ? 'is-invalid' : '' ?>" placeholder="Quantidade paginas">
    </div>

    <div class="form-group col-md-3">
        <label for="nome">Data publicação</label>
        <?php 
            $data_publicacao = $livro->ano_publicacao ?? old('ano_publicacao');
            $data_publicacao = ($data_publicacao) ? \Carbon\Carbon::parse($data_publicacao)->format('d/m/Y') : '';
        ?>
        <input type="text" name="ano_publicacao" value="{{ $data_publicacao }}" class="form-control <?php echo ($errors->has('ano_publicacao')) ? 'is-invalid' : '' ?>" placeholder="Ano publicação">
    </div>

    <div class="form-group col-md-9">
        <label for="nome">Editora</label>
        <input type="text" name="editora" value="{{ $livro->editora ?? old('editora') }}" class="form-control <?php echo ($errors->has('editora')) ? 'is-invalid' : '' ?>" placeholder="Editora">
    </div>

    <div class="form-group col-md-12">
        <input type="submit" value="Salvar" class="btn btn-success">
    </div>

</div>
