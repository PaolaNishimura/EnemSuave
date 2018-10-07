{!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name') !!}
    {!! Form::submit('Nova categoria') !!}
{!! Form::close() !!}