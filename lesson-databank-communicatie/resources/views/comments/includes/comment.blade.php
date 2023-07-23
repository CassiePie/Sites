<blockquote class="comment">
    <q class="comment-content">{{ $comment->content }}</q>
    <cite class="comment-cite">{{ $comment->name }}</cite>
    <div class="comment-actions">
        <a href="/comments/{{ $comment->id }}/edit">edit</a> or
        <form action="/comments/{{ $comment->id }}" method="post">
            @csrf @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
</blockquote>
