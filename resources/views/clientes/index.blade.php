@extends('layouts.app')

@section('header')
    Clientes
    <a class="btn btn-success pull-right" href="{{ route('clientes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
@endsection

@section('content')

    <form class="form-inline" method=GET action={{route('clientes.index')}}>
        <div class="form-group">
            <label for="idNome">Nome</label>
            <input type="text" id="idNome" name="nome" value="" class="form-control" style="width:auto">
        </div>              
        <input type="reset" id="idReset" value="Limpar" class="btn btn-warning">    
        <input type="submit" id="idSubmit" value="Filtrar" class="btn btn-primary"> 
    </form>

    <hr>

    @if($clienteList->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DATA_NASCIMENTO</th>
                    <th>TELEMOVEL</th>
                    <th>SEXO</th>
                    <th>NIF</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($clienteList as $linha)
                    <tr>
                        <td>{{$linha->id}}</td>
                        <td>{{$linha->nome}}</td>
                        <td>{{$linha->data_nascimento}}</td>
                        <td>{{$linha->telemovel}}</td>
                        <td>{{$linha->sexo}}</td>
                        <td>{{$linha->NIF}}</td>
                        <td class="text-right">
                            <a class="btn btn-xs btn-primary" href="{{ route('clientes.show', $linha->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                            <a class="btn btn-xs btn-warning" href="{{ route('clientes.edit', $linha->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <form action="{{ route('clientes.destroy', $linha->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $clienteList->render() !!}
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

@endsection