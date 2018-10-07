<pre>
    @if(isset($archives))
        @foreach($archives as $archive)
            {{ $archive }};
        @endforeach
    @endif
</pre>