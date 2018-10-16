{!! Form::open(['route' => ['posts.categories.store', $post->id], 'method' => 'post']) !!}
    <select name="categories_id">
    @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
    {!! Form::submit('Adicionar Categoria') !!}
{!! Form::close() !!}

@foreach($categoriesAttachedToPost as $category)
    <p>{{$category->name}}</p>
@endforeach