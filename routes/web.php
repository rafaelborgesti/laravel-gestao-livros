<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin','namespace' => 'Admin',], function(){
    
    Route::resource('categorias', 'CategoriaController');
    Route::resource('livros', 'LivroController');
    Route::match(['POST','GET'],'livro/adicionar-capa/{id}','LivroController@adicionar_capa')->name('livro-capa.adicionar');
    Route::post('livro/excluir-capa/{id}','LivroController@excluir_capa')->name('livro-capa.excluir');

    


    //Route::get('imagem', 'LivroController');

});

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
