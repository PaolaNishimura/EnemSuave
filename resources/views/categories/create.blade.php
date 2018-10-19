@extends('adminlte::page')

@section('title', 'Criar Categorias')

@section('content')
    @section('content_header')
        <h1>Criar Categoria</h1>
    @stop

    {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name') !!}
        {!! Form::submit('Nova categoria') !!}
    {!! Form::close() !!}

@endsection