{!! Form::open(['route' => ['videos.categories.store', $video->id], 'method' => 'post']) !!}
    <select name="categories_id">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    {!! Form::submit('Adicionar Categoria') !!}
{!! Form::close() !!}

@foreach($categoriesAttachedToVideo as $category)
    <p>{{$category->name}}</p>
@endforeach