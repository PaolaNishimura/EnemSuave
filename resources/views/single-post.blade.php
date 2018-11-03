@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-sm-12">
            <h1>{{$post->title}}</h1>
            <div>
                {{$post->created_at->diffForHumans()}}
            </div>
            @foreach($post->categories as $categorie)
                <a href="{{route('home.categories', $categorie->id)}}" style="margin-bottom: 15px;" class="badge badge-info">{{$categorie->name}}</a>
            @endforeach
            <div>
                {{$post->content}}
            </div>
            <div>
                @foreach($post->archives as $archive)
                    <form action="{{route('archives.download', $archive->url)}}" method="POST">
                        @csrf
                        <button class="btn btn-success">{{$archive->title}}</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection