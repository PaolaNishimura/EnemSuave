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
            <div  class="video-container">
                <iframe frameborder="0" allowfullscreen
                    src="{{$post->url}}">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection