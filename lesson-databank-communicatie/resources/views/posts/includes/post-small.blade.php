<article class="post-small">
    <h1 class="post-small-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h1>
    <p class="post-small-subtitle">{{ $post->subtitle }}</p>
    <div class="post-small-content">
        @if(strlen($post->content) > 100)
            {{ substr($post->content, 0, 100) }}...
        @else
            {{ $post->content }}
        @endif
    </div>
    <footer>
        <a class="post-small-readmore" href="/posts/{{ $post->id }}">Read more &rarr;</a>
    </footer>
</article>
