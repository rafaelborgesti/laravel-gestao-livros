<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTabelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Categoria::class, 20)->create();
    }
}