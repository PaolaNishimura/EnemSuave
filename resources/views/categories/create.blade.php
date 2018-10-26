@extends('adminlte::page')

@section('title', 'Criar Categorias')

@section('content')
    @section('content_header')
        <h1>Criar Categoria</h1>
    @stop

    {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}
            {!! Form::text('name', '',['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Nova categoria', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection