@extends('layout/principal')
@section('conteudo')
@if(empty($produtos))
	<div class="alert alert-danger">
		Você não tem nenhum produto cadastrado.
	</div>
@else
	<h1>Listagem de produtos</h1>
	<table class='table table-striped table-bordered table-hover'>
		<thead>
			<tr>
				<td>Nome</td>
				<td>Valor</td>
				<td>Descrição</td>
				<td>Quantidade</td>
				<td>Ação</td>
			</tr>
		</thead>
		<tbody>
			@foreach($produtos as $produto)
				<tr class="{{ $produto->quantidade <=1 ? 'danger' : '' }}">
					<td>{{ $produto->nome }}</td>
					<td>{{ $produto->valor }}</td>
					<td>{{ $produto->descricao }}</td>
					<td>{{ $produto->quantidade }}</td>
					<td>
						<a href="/produtos/visualizar/<?= $produto->id ?>">Visualizar</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<h4>
		<span class="label label-danger pull-right">
			Um ou menos itens no estoque
		</span>
	</h4>
@endif
@stop