@extends('adminlte::page')

@section('title', 'Criar Arquivo')

@section('content')

    @section('content_header')
        <h1>Criar Arquivo</h1>
    @stop

    {!! Form::open(['route' => 'archives.store', 'method' => 'post', 'files' => 'true']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::file('archive') !!}
        {!! Form::submit('Novo arquivo') !!}
    {!! Form::close() !!}

@endsection