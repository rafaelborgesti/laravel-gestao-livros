@csrf

<div class="form-group">
    <input type="text" name="nome" value="{{ $categoria->nome ?? old('nome') }}" class="form-control" placeholder="Nome">
</div>

<div class="form-group">
    <input type="submit" value="Salvar" class="btn btn-success">
</div>
