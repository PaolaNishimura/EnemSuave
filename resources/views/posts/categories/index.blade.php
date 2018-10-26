@extends('adminlte::page')

@section('title', 'Adicionar Categoria ao Post')

@section('content')

    @section('content_header')
        <h1>Adicionar Categoria ao Post</h1>
    @stop

    {!! Form::open(['route' => ['posts.categories.store', $post->id], 'method' => 'post']) !!}
        <div class="form-group">
            <select name="categories_id" class="form-control">
                <option value="N" selected="selected">Selecione um categoria</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        {!! Form::submit('Adicionar Categoria') !!}
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
            @if(!$categoriesAttachedToPost->isEmpty())
                @foreach($categoriesAttachedToPost as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><form method="post" action="{{ route('posts.categories.destroy', [$post->id, $category->id]) }}">
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