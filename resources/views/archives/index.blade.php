@extends('adminlte::page')

@section('title', 'Arquivos')

@section('content')

    @section('content_header')
        <h1>Arquivos</h1>
    @stop

    <pre>
        @if(isset($archives))
            @foreach($archives as $archive)
                {{ $archive }};
            @endforeach
        @endif
    </pre>

@endsection