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

Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function(){
    Route::get('produtos', 'ProdutoController@index');
    Route::get('produto/cadastro', 'ProdutoController@create');
    Route::controller('carros', 'Painel\CarrosController');
    Route::controller('cor', 'CoresController');
    Route::controller('marca', 'MarcaController'); 
    Route::controller('/', 'Painel\PainelController');
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::controller('/', 'Site\HomeController');

/*Route::get('query-builder', function(){
    dd((DB::table('carros')->get()));
});*/

/*Route::get('query-builder', function(){
   inserir dd((DB::table('carros')->insert(['nome' => 'RENAULT', 'placa' => 'TXT8956', 'id_marca' => 3])));
    update dd((DB::table('carros')->WHERE('ID', 3)->UPDATE(['NOME' => 'etctec'])));
   deletar dd((DB::table('carros')->WHERE('ID', 3)->delete()); 
});*/