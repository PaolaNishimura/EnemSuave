@extends('adminlte::page')

@section('title', 'Criar Video')

@section('content')

    @section('content_header')
        <h1>Criar Video</h1>
    @stop

    {!! Form::open(['route' => 'videos.store', 'method' => 'post']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::label('rel', 'Rel') !!}
        {!! Form::text('rel') !!}
        {!! Form::label('url', 'Url do Embed') !!}
        {!! Form::text('url') !!}
        {!! Form::submit('Novo Video') !!}
    {!! Form::close() !!}

@endsection