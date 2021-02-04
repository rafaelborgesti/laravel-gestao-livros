<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->get();
        return view('admin.categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
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
            'nome' => 'required'
        ]);
        $categoria = new Categoria([
            'uuid' => Str::uuid(),
            'nome' => $request->nome
        ]);
        $categoria->save();

        return redirect()
            ->route('categorias.index')
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
        if (!$categoria = Categoria::where('uuid','=' ,$uuid)->first())
            return redirect()->back();
        return view('admin.categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (!$categoria = Categoria::where('uuid','=' ,$uuid)->first())
            return redirect()->back();
        return view('admin.categorias.edit',compact('categoria'));
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
            'nome' => 'required'
        ]);

        $categoria =  Categoria::where('uuid','=' ,$uuid)->first();
        $categoria->nome = $request->nome;
        $categoria->update();

        return redirect()
            ->route('categorias.index')
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
        $categoria = Categoria::where('uuid', '=', $uuid)->delete();
        
        return redirect()
            ->route('categorias.index')
            ->withSuccess('Excluído com sucesso!');
    }
}
