{!! Form::open(['route' => ['posts.archives.store', $post->id], 'method' => 'post']) !!}
    <select name="archives_id">
    @foreach($archives as $archive)
        <option value="{{$archive->id}}">{{$archive->title}}</option>
    @endforeach
    </select>
    {!! Form::submit('Adicionar Arquivo') !!}
{!! Form::close() !!}

@foreach($archivesAttachedToPost as $archives)
    <p>{{$archives->title}}</p>
@endforeach