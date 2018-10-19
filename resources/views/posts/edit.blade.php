@extends('adminlte::page')

@section('title', 'Editar Postagem')

@section('content')

    @section('content_header')
        <h1>Editar Postagem</h1>
    @stop

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::label('content', 'Conteudo') !!}
        {!! Form::textarea('content') !!}
        {!! Form::submit('Editar post') !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('Deletar post') !!}
    {!! Form::close() !!}

@endsection