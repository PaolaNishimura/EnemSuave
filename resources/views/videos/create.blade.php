{!! Form::open(['route' => 'videos.store', 'method' => 'post']) !!}
    {!! Form::label('title', 'Titulo') !!}
    {!! Form::text('title') !!}
    {!! Form::label('rel', 'Rel') !!}
    {!! Form::text('rel') !!}
    {!! Form::label('url', 'Url do Embed') !!}
    {!! Form::text('url') !!}
    {!! Form::submit('Novo Video') !!}
{!! Form::close() !!}