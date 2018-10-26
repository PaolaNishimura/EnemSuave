@extends('adminlte::page')

@section('title', 'Videos')

@section('content')
    @section('content_header')
        <h1>Videos</h1>
    @stop

<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">Titulo
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Categorias
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Editar
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Deletar
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        @if(isset($videos))
            @foreach($videos as $video)
                <tr>
                    <td>{{$video->title}}</td>
                    <td><a class="btn btn-warning" href="{{route('videos.categories.index', $video->id)}}">Mudar</a></td>
                    <td><a class="btn btn-warning" href="{{route('videos.edit', $video->id)}}">Editar</a></td>
                    <td><form method="post" action="{{route('videos.destroy', $video->id)}}">
                            @csrf
                            <input hidden name="_method" value="delete">
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="3">Não existe nenhum registro</td>
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