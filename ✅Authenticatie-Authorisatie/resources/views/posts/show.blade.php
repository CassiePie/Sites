@extends('layouts.default')

@section('title', $post->title)

@section('content')
    <section class="post-details">
        <header class="post-header">
            <h2 class="post-title">{{ $post->title }}</h2>
            <p class="post-subtitle">{{ $post->subtitle }}</p>
            <p class="post-username">
                Written by <a href="{{ route('users.show', $post->user) }}">{{ $post->user->username }}</a>
            </p>
        </header>

        <div class="post-actions">
            <a href="{{ route('posts.edit', $post) }}">Edit this post</a> or
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="Delete this post">
            </form>
        </div>

        <div>
            {{ $post->content }}
        </div>

        <aside class="comments">
            <h3>Comments</h3>
            <div class="comment-section">
                <div class="comment-form">
                    <form action="{{ route('comments.store') }}" method="post">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        @include('comments.includes.form', ['buttonText' => "Add comment"])
                    </form>
                </div>
                <div class="comments-list">
                    @forelse ($post->comments as $comment)
                        @include('comments.includes.comment', ['comment' => $comment])
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            </div>
        </aside>
    </section>
@endsection
