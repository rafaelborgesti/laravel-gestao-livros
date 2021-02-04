<?php

namespace App\Http\Controllers\Admin;;

use App\Categoria;
use App\Livro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;


class LivroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::orderBy('created_at', 'desc')->get();
        return view('admin.livros.index',compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('admin.livros.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'isbn' => 'required',
            'descricao' => 'required',
            'nome_autor' => 'required',
            'preco' => 'required',
            'ano_publicacao' => 'required',
            'editora' => 'required',
            'quantidade_paginas' => 'required'
        ]);
        
        $livro = new Livro([
            'uuid' => Str::uuid(),
            'titulo' => $request->titulo,
            'categoria_id' => $request->categoria,
            'usuario_id' => Auth::id(),
            'isbn' => $request->isbn,
            'descricao' => $request->descricao,
            'nome_autor' => $request->nome_autor,
            'preco' => $request->preco,
            'ano_publicacao' => Carbon::parse($request->ano_publicacao),
            'editora' => $request->editora,
            'quantidade_paginas' => $request->quantidade_paginas,
            'imagem_capa' => $request->nome_autor,
            'st_ativo' => 1
        ]);
        $livro->save();

        return redirect()
            ->route('livros.index')
            ->withSuccess('Adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        if (!$livro = Livro::where('uuid','=' ,$uuid)->with('categoria')->first())
            return redirect()->back();
        return view('admin.livros.show',compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (!$livro = Livro::where('uuid','=' ,$uuid)->first())
            return redirect()->back();

        $categorias = Categoria::all();
        return view('admin.livros.edit',compact('livro','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {

        $request->validate([
            'titulo' => 'required',
            'categoria' => 'required',
            'isbn' => 'required',
            'descricao' => 'required',
            'nome_autor' => 'required',
            'preco' => 'required',
            'ano_publicacao' => 'required',
            'editora' => 'required',
            'quantidade_paginas' => 'required'
        ]);

        $livro = Livro::where('uuid','=' ,$uuid)->first();
        $livro->titulo = $request->titulo;
        $livro->categoria_id = $request->categoria;
        $livro->usuario_id = Auth::id();
        $livro->isbn = $request->isbn;
        $livro->descricao = $request->descricao;
        $livro->nome_autor = $request->nome_autor;
        $livro->preco = $request->preco;
        $livro->ano_publicacao = Carbon::parse($request->ano_publicacao);
        $livro->editora = $request->editora;
        $livro->quantidade_paginas = $request->quantidade_paginas;
        $livro->update();

        return redirect()
            ->route('livros.index')
            ->withSuccess('Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $livro = Livro::where('uuid', '=', $uuid)->delete();
        
        return redirect()
            ->route('livros.index')
            ->withSuccess('Excluído com sucesso!');
    }
}
