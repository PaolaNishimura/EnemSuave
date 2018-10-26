@extends('adminlte::page')

@section('title', 'Criar Video')

@section('content')

    @section('content_header')
        <h1>Criar Video</h1>
    @stop

    {!! Form::open(['route' => 'videos.store', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rel', 'Rel') !!}
            {!! Form::text('rel', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('url', 'Url do Embed') !!}
            {!! Form::text('url', '', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Novo Video', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection