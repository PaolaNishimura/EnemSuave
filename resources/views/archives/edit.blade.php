@extends('adminlte::page')

@section('title', 'Editar Arquivo')

@section('content')

    @section('content_header')
        <h1>Editar Arquivo</h1>
    @stop

    <div class="form-group">
        {!! Form::label('file', 'Nome Arquivo') !!}
        <p>{{$archive->url}}</p>
        <form action="{{route('archives.download', $archive->url)}}" method="POST">
            @csrf
            <button class="btn btn-success">Download</button>
        </form>
    </div>

    {!! Form::model($archive, ['route' => ['archives.update', $archive->id], 'method' => 'put', 'files' => 'true']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', $archive->title, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::file('archive', ['class' => 'form-control-file']) !!}
        </div>
        {!! Form::submit('Editar arquivo', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection