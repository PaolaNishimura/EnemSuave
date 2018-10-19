@extends('adminlte::page')

@section('title', 'Postagens')

@section('content')

    @section('content_header')
        <h1>Postagens</h1>
    @stop


    <pre>
        @if(isset($posts))
            @foreach($posts as $post)
                {{ $post }};
            @endforeach
        @endif
    </pre>

@endsection