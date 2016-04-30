<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('teste', function (){
    return 'isso é um teste';
});
Route::get('produto/{id}', function ($id){
    return "o id do produto é => {$id}";
});
Route::get('usuario/logado/{nome?}', function($name = 'everson'){
    return "nome {$name}";
});
 * 
 */

Route::get('produtos', 'ProdutoController@index');
Route::get('produto/cadastro', 'ProdutoController@create');

Route::controller('carros', 'CarrosController');
Route::controller('cor', 'CoresController');
Route::controller('marca', 'MarcaController');