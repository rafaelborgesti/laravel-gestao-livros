<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['uuid',
                          'titulo',
                          'categoria_id',
                          'usuario_id',
                          'isbn',
                          'descricao',
                          'nome_autor',
                          'preco',
                          'ano_publicacao',
                          'editora',
                          'quantidade_paginas',
                          'imagem_capa',
                          'st_ativo'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

