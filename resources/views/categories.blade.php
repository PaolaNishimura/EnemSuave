@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        @if(isset($posts))
            <div class="col-sm-3">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <a href="{{route('home.categories', $category->id)}}" class="list-group-item d-flex justify-content-between align-items-center">
                            {{$category->name}}
                            <span class="badge badge-primary badge-pill">{{$category->posts_count + $category->videos_count}}</span>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                @foreach($posts as $post)
                    @if($post instanceof App\Post)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="card-title-div">
                                        <h5 style="margin-bottom: 0;" class="card-title">{{$post->title}}</h5>
                                        @foreach($post->categories as $categorie)
                                            <a href="{{route('home.categories', $categorie->id)}}" style="margin-bottom: 15px;" class="badge badge-info">{{$categorie->name}}</a>
                                        @endforeach
                                    </div>
                                    <p class="card-text">{{$post->content}}</p>
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
                @endforeach
                
                {{ $posts->links() }}
            </div>
        @else
            <div class="col-sm-12">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <a href="{{route('home.categories', $category->id)}}" class="list-group-item d-flex justify-content-between align-items-center">
                            {{$category->name}}
                            <span class="badge badge-primary badge-pill">{{$category->posts_count + $category->videos_count}}</span>
                        </a>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection