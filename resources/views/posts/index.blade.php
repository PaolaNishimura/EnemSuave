<pre>
    @if(isset($posts))
        @foreach($posts as $post)
            {{ $post }};
        @endforeach
    @endif
</pre>