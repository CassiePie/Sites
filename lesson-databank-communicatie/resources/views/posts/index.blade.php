@extends('layouts.default')

@section('title', 'Posts')

@section('content')
    <section>
        <h2>Posts</h2>
        <div class="posts-list">
            @forelse ($posts as $post)
                @include('posts.includes.post-small')
            @empty
                <p>No posts yet.</p>
            @endforelse
        </div>
        <div class="pagination">
            Previous ... 1 2 3 ... Next
        </div>
    </section>
@endsection
