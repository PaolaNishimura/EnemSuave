@extends('layouts.app')

@section('content')
<div class="container content">
  <div class="row">
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-1.jpg') }}" alt="">
    </div>
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-2.png') }}" alt="">
    </div>
    <div class="col-sm">
        <img class="img-fluid rounded" src="{{ asset('imgs/home-3.jpg') }}" alt="">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
        @foreach($posts as $post)
        <div class="card mb-3">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <div class="card-footer text-muted">
                    {{$post->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
            {{$post}}
        @endforeach
    </div>
  </div>
</div>
@endsection