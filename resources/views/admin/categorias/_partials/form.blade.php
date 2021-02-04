@csrf

<div class="form-row align-items-center">

    <div class="form-group col-md-12">
        <label for="nome">Categoria</label>
        <input type="text" name="nome" value="{{ $categoria->nome ?? old('nome') }}" class="form-control <?php echo ($errors->has('nome')) ? 'is-invalid' : '' ?>" placeholder="Nome">
    </div>

    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-success">
    </div>
    
</div>
