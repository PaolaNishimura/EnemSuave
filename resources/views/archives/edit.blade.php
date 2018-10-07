{!! Form::model($achive, ['route' => 'archives.store', 'method' => 'put', 'files' => 'true']) !!}
    {!! Form::label('title', 'Titulo') !!}
    {!! Form::text('title') !!}
    {!! Form::file('archive') !!}
    {!! Form::submit('Novo arquivo') !!}
{!! Form::close() !!}