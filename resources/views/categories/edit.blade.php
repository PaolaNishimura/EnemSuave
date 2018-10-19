@extends('adminlte::page')

@section('title', 'Editar Categorias')

@section('content')

    @section('content_header')
        <h1>Editar Categoria</h1>
    @stop

    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name') !!}
        {!! Form::submit('Editar categoria') !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
        {!! Form::submit('Deletar categoria') !!}
    {!! Form::close() !!}

@endsection