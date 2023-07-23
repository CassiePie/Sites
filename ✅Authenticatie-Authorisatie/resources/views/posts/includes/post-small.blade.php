<article class="post-small">
    <h1 class="post-small-title">
        <a href="{{ route('posts.show', $post) }}">
            {{ $post->title }}
        </a>
    </h1>
    <p class="post-small-subtitle">
        {{ $post->subtitle }}
    </p>
    <p class="post-small-username">
        written by <a href="{{ route('users.show', $post->user) }}">{{ $post->user->username }}</a>
    </p>
    <div class="post-small-content">
        @if(strlen($post->content) > 100)
            {{ substr($post->content, 0, 100) }}...
        @else
            {{ $post->content }}
        @endif
    </div>
    <footer>
        <a class="post-small-readmore" href="{{ route('posts.show', $post) }}">Read more &rarr;</a>
    </footer>
</article>
