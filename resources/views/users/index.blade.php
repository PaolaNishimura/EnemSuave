<pre>
    @if(isset($users))
        @foreach($users as $user)
            {{ $user }};
        @endforeach
    @endif
</pre>