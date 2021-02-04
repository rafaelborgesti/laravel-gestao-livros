<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->BigInteger('categoria_id')->unsigned()->nullable();
            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->string('nome', 100)->nullable(false);
            $table->string('isbn', 13)->nullable(false);
            $table->text('descricao')->nullable(false);
            $table->string('nome_autor', 100)->nullable(false);
            $table->decimal('preco', 10, 2)->nullable(false);
            $table->date('ano_publicacao')->nullable(false);
            $table->string('editora', 100)->nullable(false);
            $table->integer('quantidade_paginas')->nullable(false);
            $table->string('imagem_capa',50);
            $table->tinyInteger('st_ativo')->default(1)->nullable(false);
            $table->timestamp('data_cadastro');
            $table->timestamp('data_alteracao');
        });

        Schema::table('livros', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
