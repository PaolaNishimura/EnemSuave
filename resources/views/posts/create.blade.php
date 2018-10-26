@extends('adminlte::page')

@section('title', 'Criar Postagem')

@section('content')

    @section('content_header')
        <h1>Criar Postagem</h1>
    @stop

    {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Conteudo') !!}
            {!! Form::textarea('content', '', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Novo Post', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection