<?php

use App\Categoria;
use App\Livro;
use App\User;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Livro::class, 5)->create([
            "categoria_id" => Categoria::all()->random()->id, 
            "usuario_id" => User::all()->random()->id
        ]);

        //factory(User::class, 5)->create()->each(function ($usuario) {
        //    factory(Categoria::class, 10)->create(["usuario_id" => $usuario->id])->each(function ($categoria) {
        //        factory(Livro::class, 2)->create(["categoria_id" => $categoria->id, "usuario_id" => $categoria->usuario_id]);
        //    });
        //});
    }
}
