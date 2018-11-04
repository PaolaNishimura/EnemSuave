@extends('layouts.app')

@section('content')
<div class="container content">
  <div class="row">
        <div class="col-sm-4 top-img">
            <img class="img-fluid rounded" src="{{ asset('imgs/home-1.jpg') }}" alt="">
        </div>
        <div class="col-sm-4 top-img">
            <img class="img-fluid rounded" src="{{ asset('imgs/home-3.jpg') }}" alt="">
        </div>
        <div class="col-sm-4 top-img">
            <img class="img-fluid rounded" src="{{ asset('imgs/home-2.png') }}" alt="">
        </div>

    @foreach($posts as $post)
            <div class="col-sm-12 content">
        @if($post instanceof App\Post)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title-div">
                            <h5 style="margin-bottom: 0;" class="card-title">{{$post->title}}</h5>
                            @foreach($post->categories as $categorie)
                                <a href="{{route('home.categories', $categorie->id)}}" class="badge badge-info">{{$categorie->name}}</a>
                            @endforeach
                        </div>
                        <p class="card-text">{{substr($post->content, 0, 120)}}</p>
                        <a href="{{route('home.post', $post->id)}}" class="btn btn-post">Continuar Lendo</a>
                        <div class="card-footer text-muted">
                            {{$post->created_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
        @else
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title-div">
                            <h5 style="margin-bottom: 0;" class="card-title">{{$post->title}}</h5>
                            @foreach($post->categories as $categorie)
                                <a href="{{route('home.categories', $categorie->id)}}" style="margin-bottom: 15px;" class="badge badge-info">{{$categorie->name}}</a>
                            @endforeach
                        </div>
                        <div class="video-container">
                            <iframe frameborder="0" allowfullscreen
                                src="{{$post->url}}">
                            </iframe>
                        </div>
                        <a href="{{route('home.video', $post->id)}}" class="btn btn-post">Ver Video</a>
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