@extends('adminlte::page')

@section('title', 'Categorias')

@section('content')

    @section('content_header')
        <h1>Categorias</h1>
    @stop

    <table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="th-sm">Nome
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
        @if(isset($categories))
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td><a class="btn btn-warning" href="{{route('categories.edit', $category->id)}}">Editar</a></td>
                    <td><form method="post" action="{{route('categories.destroy', $category->id)}}">
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