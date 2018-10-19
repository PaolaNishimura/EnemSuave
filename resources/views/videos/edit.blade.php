@extends('adminlte::page')

@section('title', 'Editar Video')

@section('content')

    @section('content_header')
        <h1>Editar Video</h1>
    @stop

    {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'put']) !!}
        {!! Form::label('title', 'Titulo') !!}
        {!! Form::text('title') !!}
        {!! Form::label('rel', 'Rel') !!}
        {!! Form::text('rel') !!}
        {!! Form::label('url', 'Url do Embed') !!}
        {!! Form::text('url') !!}
        {!! Form::submit('Editar Video') !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'delete']) !!}
        {!! Form::submit('Deletar Video') !!}
    {!! Form::close() !!}

@endsection