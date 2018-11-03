@extends('layouts.app')

@section('content')
<div class="container content">
  <div class="row">
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-1.jpg') }}" alt="">
    </div>
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-3.jpg') }}" alt="">
    </div>
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-2.png') }}" alt="">
    </div>
  </div>

  <div class="row">
    @foreach($posts as $post)
            <div class="col-sm-6">
        @if($post instanceof App\Post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 style="margin-bottom: 0;" class="card-title">{{$post->title}}</h5>
                        @foreach($post->categories as $categorie)
                            <a href="{{route('home.categories', $categorie->id)}}" style="margin-bottom: 15px;" class="badge badge-info">{{$categorie->name}}</a>
                        @endforeach
                        <p class="card-text">{{$post->content}}</p>
                        <a href="{{route('home.post', $post->id)}}" class="btn btn-success">Ver Post</a>
                        <div class="card-footer text-muted">
                            {{$post->created_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
        @else
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 style="margin-bottom: 0;" class="card-title">{{$post->title}}</h5>
                        @foreach($post->categories as $categorie)
                            <a href="{{route('home.categories', $categorie->id)}}" style="margin-bottom: 15px;" class="badge badge-info">{{$categorie->name}}</a>
                        @endforeach
                        <div class="video-container">
                            <iframe frameborder="0" allowfullscreen
                                src="{{$post->url}}">
                            </iframe>
                        </div>
                        <a href="{{route('home.video', $post->id)}}" class="btn btn-success">Ver Video</a>
                        <div class="card-footer text-muted">
                            {{$post->created_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
        @endif
            </div>
            
            {{ $posts->links() }}
    @endforeach
  </div>
</div>
@endsection