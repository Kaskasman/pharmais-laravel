@extends('layouts.app')

@section('header')
    Medicamentos
@endsection

@section('content')
	<form class="form-inline" method=GET action={{route('medicamento.index')}}>
		<div class="form-group">
			<label for="idNome">Nome</label>
			<input type="text" id="idNome" name="nome" value="" class="form-control" style="width:auto">
		</div>				
		<input type="reset" id="idReset" value="Limpar" class="btn btn-warning">	
		<input type="submit" id="idSubmit" value="Filtrar" class="btn btn-primary">	
	</form>

	<hr>

	@if($medicamentosList->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>GENERICO</th>
                    <th>NOME GENERICO</th>
                    <th>PRECO</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($medicamentosList as $linha)
                    <tr>
                        <td>{{$linha->id}}</td>
                        <td>{{$linha->nome}}</td>
                        <td>{{$linha->nome_generico}}</td>

                        @if($linha['generico']=="1")
                            <td>{{'Sim'}}</td>
                        @else
                            <td>{{'Não'}}</td>
                        @endif

                        <td>{{$linha->preco}}</td>

                        <td class="text-right">
                            <a class="btn btn-xs btn-primary" href="{{ url('/home') }}">Adicionar Carrinho</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $medicamentosList->render() !!}
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

@endsection