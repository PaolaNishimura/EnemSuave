{!! Form::open(['route' => 'archives.store', 'method' => 'post', 'files' => 'true']) !!}
    {!! Form::label('title', 'Titulo') !!}
    {!! Form::text('title') !!}
    {!! Form::file('archive') !!}
    {!! Form::submit('Novo arquivo') !!}
{!! Form::close() !!}