@extends('adminlte::page')

@section('title', 'Editar Categorias')

@section('content')

    @section('content_header')
        <h1>Editar Categoria</h1>
    @stop

    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', $category->nome, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Editar categoria', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection