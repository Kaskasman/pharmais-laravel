@extends('layouts.app')

@section('header')
    Utilizadores
@endsection

@section('content')

    @if($userList->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>TIPO</th>
                    <th>ATIVO</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
            </thead>

            <tbody>
                @foreach($userList as $linha)
                    <tr>
                        <td>{{$linha->id}}</td>
                        <td>{{$linha->name}}</td>
                        <td>{{$linha->email}}</td>

                        @if($linha['type']=="A")
                            <td>{{'Administrador'}}</td>
                        @else
                            <td>{{'Funcionario'}}</td>
                        @endif

                        @if($linha['active']=="1")
                            <td></td>
                        @else
                            <td>{{'Inativo'}}</td>
                        @endif

                        <td class="text-right">
                            <form action="{{ route('users.update', $linha->id, $linha->active) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Change</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $userList->render() !!}
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
    
@endsection