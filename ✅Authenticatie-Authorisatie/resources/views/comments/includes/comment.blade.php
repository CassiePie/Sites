<blockquote class="comment">
    <q class="comment-content">
        {{ $comment->content }}
    </q>
    <cite class="comment-cite">
        by <a href="{{ route('users.show', $comment->user) }}">{{ $comment->user->name }}</a>
    </cite>
    <div class="comment-actions">
        <a href="{{ route('comments.edit', $comment) }}">edit</a>

        or

        <form action="{{ route('comments.destroy', $comment) }}" method="post">
            @csrf
            @method("DELETE")
            <input type="submit" value="delete">
        </form>
    </div>
</blockquote>
