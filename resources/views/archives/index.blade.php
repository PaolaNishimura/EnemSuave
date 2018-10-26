@extends('adminlte::page')

@section('title', 'Arquivos')

@section('content')

    @section('content_header')
        <h1>Arquivos</h1>
    @stop


<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">Nome
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Caminho
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
        @if(isset($archives))
            @foreach($archives as $archive)
                <tr>
                    <td>{{$archive->title}}</td>
                    <td><form action="{{route('archives.download', $archive->url)}}" method="POST">
                            @csrf
                            <button class="btn btn-success">Download</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{route('archives.edit', $archive->id)}}">Editar</a></td>
                    <td><form method="post" action="{{route('archives.destroy', $archive->id)}}">
                            @csrf
                            <input hidden name="_method" value="delete">
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Não existe nenhum registro</td>
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