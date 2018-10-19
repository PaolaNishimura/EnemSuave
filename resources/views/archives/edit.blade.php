@extends('adminlte::page')

@section('title', 'Editar Arquivo')

@section('content')

    @section('content_header')
        <h1>Editar Arquivo</h1>
    @stop

    {!! Form::model($achive, ['route' => 'archives.store', 'method' => 'put', 'files' => 'true']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::file('archive') !!}
        {!! Form::submit('Novo arquivo') !!}
    {!! Form::close() !!}

@endsection