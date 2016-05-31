@extends('layouts.app')

@section('header')
    Cliente /Create
@endsection

@section('content')
    @include('error')

<!--    @if (Auth::guest())

        @else

        @endif  -->

        <form action="{{ route('clientes.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if($errors->has('nome')) has-error @endif">
                <label for="nome-field">Nome</label>
                <input type="text" id="nome-field" name="nome" class="form-control" value="{{ old("nome") }}"/>
                    @if($errors->has("nome"))
                        <span class="help-block">{{ $errors->first("nome") }}</span>
                    @endif
            </div>
            <div class="form-group @if($errors->has('data_nascimento')) has-error @endif">
                <label for="data_nascimento-field">Data_nascimento</label>
                <input type="text" id="data_nascimento-field" name="data_nascimento" class="form-control" value="{{ old("data_nascimento") }}"/>
                    @if($errors->has("data_nascimento"))
                        <span class="help-block">{{ $errors->first("data_nascimento") }}</span>
                    @endif
            </div>
            <div class="form-group @if($errors->has('telemovel')) has-error @endif">
                <label for="telemovel-field">Telemovel</label>
                <input type="text" id="telemovel-field" name="telemovel" class="form-control" value="{{ old("telemovel") }}"/>
                    @if($errors->has("telemovel"))
                        <span class="help-block">{{ $errors->first("telemovel") }}</span>
                    @endif
            </div>
            <div class="form-group @if($errors->has('sexo')) has-error @endif">
                <label for="sexo-field">Sexo</label>
                <input type="text" id="sexo-field" name="sexo" class="form-control" value="{{ old("sexo") }}"/>
                    @if($errors->has("sexo"))
                        <span class="help-block">{{ $errors->first("sexo") }}</span>
                    @endif
            </div>
            <div class="form-group @if($errors->has('NIF')) has-error @endif">
                <label for="nif-field">Nif</label>
                <input type="text" id="nif-field" name="nif" class="form-control" value="{{ old("NIF") }}"/>
                @if($errors->has("NIF"))
                    <span class="help-block">{{ $errors->first("NIF") }}</span>
                @endif
            </div>
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Create</button>
                <a class="btn btn-link pull-right" href="{{ route('clientes.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
        </form>

@endsection