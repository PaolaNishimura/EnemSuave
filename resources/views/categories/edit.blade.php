{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name') !!}
    {!! Form::submit('Editar categoria') !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
    {!! Form::submit('Deletar categoria') !!}
{!! Form::close() !!}