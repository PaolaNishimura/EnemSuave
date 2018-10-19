@extends('adminlte::page')

@section('title', 'Adicionar Categoria a Postagem')

@section('content')

    @section('content_header')
        <h1>Adicionar Categoria a Postagem</h1>
    @stop

    {!! Form::open(['route' => ['posts.categories.store', $post->id], 'method' => 'post']) !!}
        <select name="categories_id">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        {!! Form::submit('Adicionar Categoria') !!}
    {!! Form::close() !!}

    @foreach($categoriesAttachedToPost as $category)
        <p>{{$category->name}}</p>
    @endforeach

@endsection