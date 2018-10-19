@extends('adminlte::page')

@section('title', 'Categorias')

@section('content')

    @section('content_header')
        <h1>Categorias</h1>
    @stop

    <pre>
        @if(isset($categories))
            @foreach($categories as $category)
                {{ $category }};
            @endforeach
        @endif
    </pre>

@endsection