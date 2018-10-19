@extends('adminlte::page')

@section('title', 'Criar Postagem')

@section('content')

    @section('content_header')
        <h1>Criar Postagem</h1>
    @stop

    {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::label('content', 'Conteudo') !!}
        {!! Form::textarea('content') !!}
        {!! Form::submit('Novo Post') !!}
    {!! Form::close() !!}

@endsection