@extends('adminlte::page')

@section('title', 'Adicionar Categoria ao Post')

@section('content')

    @section('content_header')
        <h1>Adicionar Arquivo ao Post</h1>
    @stop

    {!! Form::open(['route' => ['posts.archives.store', $post->id], 'method' => 'post']) !!}
        <div class="form-group">
            <select name="archives_id" class="form-control">
                <option value="N" selected="selected">Selecione um arquivo</option>
            @foreach($archives as $archive)
                <option value="{{$archive->id}}">{{$archive->title}}</option>
            @endforeach
            </select>
        </div>
        {!! Form::submit('Adicionar Arquivo') !!}
    {!! Form::close() !!}

    <table id="myTable" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Categoria
                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">Remover
                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
            </tr>
        </thead>
        <tbody>
            @if(!$archivesAttachedToPost->isEmpty())
                @foreach($archivesAttachedToPost as $archive)
                    <tr>
                        <td>{{$archive->title}}</td>
                        <td><form method="post" action="{{ route('posts.archives.destroy', [$post->id, $archive->id]) }}">
                                @csrf
                                <input hidden name="_method" value="delete">
                                <button class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">Não existe nenhum registro</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable( {
            } );
            $('#myTable_wrapper .dataTables_length').addClass('d-flex flex-row');
        });
    </script>
@stop