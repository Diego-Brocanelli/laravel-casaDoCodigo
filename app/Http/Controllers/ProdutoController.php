<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller
{
	/**
	 * View  Responsável pela lista de produtos
	 * @return  View
	 **/
	public function lista()
	{
		$produtos = DB::select('select * from produtos');
		
		return view('produto/listagem')->with('produtos', $produtos);
	}

	/**
	 * View  Responsável pela descrição do produto
	 * @return  View
	 **/
	public function visualizar($id)
	{
		//$id = Request::route('id');

		$resposta = DB::select('select * from produtos where id = ?',[$id]);

		if(empty($resposta)){
			return "Esse produto não existe";
		}
		return view('produto/detalhes')->with('produto', $resposta[0]);
	}

	/**
	 * Responsável pore renderizar a view com formulário de cadastro.
	 * @return View
	 */
	public function novo(){
		return view('produto.formulario');
	}

	public function adiciona(){
		$nome       = Request::input('nome');
		$descricao  = Request::input('descricao');
		$valor      = Request::input('valor');
		$quantidade = Request::input('quantidade');

		DB::insert('INSERT INTO produtos VALUES (null, ?, ?, ?, ?)', array($nome, $descricao, $valor, $quantidade));

		return view('produto.adicionado')->with('nome', $nome);
	}
}