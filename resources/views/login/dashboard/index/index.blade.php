@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{-- Exibir mensagem de "Bem-vindo Fulano" --}}
                <div class="panel panel-default">
                    {{--Default panel contents--}}
                    <div class="panel-heading">Bem-vindo, {{ $user->name }}!</div>
                    {{--Dados pessoais--}}
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Nome:</strong> <span class="pull-right">{{ $user->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> <span class="pull-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Criado em:</strong> <span class="pull-right">{{ $user->created_at }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Atualizado em:</strong> <span class="pull-right">{{ $user->updated_at }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection

