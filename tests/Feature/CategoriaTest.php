<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCadastraCategoria()
    {
        $usuario = \App\User::find(1);

        \App\Categoria::create([
            'nome' => 'Filosofia',
            'usuario_id' => $usuario->id,
            'uuid' => Str::uuid()
        ]);

        $this->assertDatabaseHas('categorias',['nome'=>'Filosofia','usuario_id'=>$usuario->id]);
    }
}
