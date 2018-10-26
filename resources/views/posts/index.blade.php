@extends('adminlte::page')

@section('title', 'Postagens')

@section('content')

    @section('content_header')
        <h1>Postagens</h1>
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
            <th class="th-sm">Arquivos
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
        @if(isset($posts))
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><a class="btn btn-warning" href="{{route('posts.categories.store', $post->id)}}">Mudar Categorias</a></td>
                    <td><a class="btn btn-warning" href="{{route('posts.archives.index', $post->id)}}">Mudar Arquivos</a></td>
                    <td><a class="btn btn-warning" href="{{route('posts.edit', $post->id)}}">Editar</a></td>
                    <td><form method="post" action="{{route('posts.destroy', $post->id)}}">
                            @csrf
                            <input hidden name="_method" value="delete">
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">Não existe nenhum registro</td>
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