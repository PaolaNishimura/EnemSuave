@extends('adminlte::page')

@section('title', 'Editar Video')

@section('content')

    @section('content_header')
        <h1>Editar Video</h1>
    @stop

    {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', $video->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('rel', 'Rel') !!}
            {!! Form::text('rel', $video->rel, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('url', 'Url do Embed') !!}
            {!! Form::text('url', $video->url, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Editar Video', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection