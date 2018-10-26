@extends('adminlte::page')

@section('title', 'Criar Arquivo')

@section('content')

    @section('content_header')
        <h1>Criar Arquivo</h1>
    @stop

    {!! Form::open(['route' => 'archives.store', 'method' => 'post', 'files' => 'true']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::file('archive', ['class' => 'form-control-file']) !!}
        </div>
        {!! Form::submit('Novo arquivo', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection