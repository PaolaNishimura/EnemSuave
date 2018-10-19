@extends('adminlte::page')

@section('title', 'Painel de Controle')

@section('content')
            @section('content_header')
                <h1>Painel de Controle</h1>
            @stop

            @section('content')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está Logado!
                </div>
            @stop
@endsection
