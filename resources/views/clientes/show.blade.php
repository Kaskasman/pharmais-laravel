@extends('layouts.app')

@section('header')
    Clientes / Show #{{$clienteList->id}}
@endsection

@section('content')
     
    <form action="{{ route('clientes.destroy', $clienteList->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('clientes.edit', $clienteList->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>

    <form action="#">
        <div class="form-group">
            <label for="nome">ID</label>
            <p class="form-control-static"></p>
        </div>
        <div class="form-group">
            <label for="nome">NOME</label>
            <p class="form-control-static">{{$clienteList->nome}}</p>
        </div>
        <div class="form-group">
            <label for="data_nascimento">DATA_NASCIMENTO</label>
            <p class="form-control-static">{{$clienteList->data_nascimento}}</p>
        </div>
        <div class="form-group">
            <label for="telemovel">TELEMOVEL</label>
            <p class="form-control-static">{{$clienteList->telemovel}}</p>
        </div>
        <div class="form-group">
            <label for="sexo">SEXO</label>
            <p class="form-control-static">{{$clienteList->sexo}}</p>
        </div>
        <div class="form-group">
            <label for="nif">NIF</label>
            <p class="form-control-static">{{$clienteList->NIF}}</p>
        </div>
    </form>

    <a class="btn btn-link" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

@endsection