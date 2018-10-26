@extends('adminlte::page')

@section('title', 'Editar Postagem')

@section('content')

    @section('content_header')
        <h1>Editar Postagem</h1>
    @stop

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
    <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Conteudo') !!}
            {!! Form::textarea('content', $post->content, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Editar Post', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection