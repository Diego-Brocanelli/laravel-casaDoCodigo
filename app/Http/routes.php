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
//Home
Route::get('/', function(){
	return '<h1>Hello World!</h1>';
});
//Listagem de produtos
Route::get('/produtos', 'ProdutoController@lista');
//Visualizar produtos
Route::get('/produtos/visualizar/{id}','ProdutoController@visualizar');
//view para cadastrar produtos
Route::get('/produtos/novo', 'ProdutoController@novo');
//cadastrar produtos
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');