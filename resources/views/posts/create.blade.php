{!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}
    {!! Form::label('title', 'Titulo') !!}
    {!! Form::text('title') !!}
    {!! Form::label('content', 'Conteudo') !!}
    {!! Form::textarea('content') !!}
    {!! Form::submit('Novo Post') !!}
{!! Form::close() !!}