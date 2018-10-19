@extends('adminlte::page')

@section('title', 'Adicionar Arquivo a Postagem')

@section('content')

    @section('content_header')
        <h1>Adicionar Arquivo a Postagem</h1>
    @stop

    {!! Form::open(['route' => ['posts.archives.store', $post->id], 'method' => 'post']) !!}
        <select name="archives_id">
        @foreach($archives as $archive)
            <option value="{{$archive->id}}">{{$archive->title}}</option>
        @endforeach
        </select>
        {!! Form::submit('Adicionar Arquivo') !!}
    {!! Form::close() !!}

    @foreach($archivesAttachedToPost as $archives)
        <p>{{$archives->title}}</p>
    @endforeach

@endsection