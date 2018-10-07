<pre>
    @if(isset($categories))
        @foreach($categories as $category)
            {{ $category }};
        @endforeach
    @endif
</pre>