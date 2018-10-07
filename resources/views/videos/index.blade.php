@if(isset($videos))
    @foreach($videos as $video)
        <h1>{{$video->title}}</h1>
        <iframe width="547" height="410" rel="{{$video->rel}}" src="{{$video->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    @endforeach
@endif