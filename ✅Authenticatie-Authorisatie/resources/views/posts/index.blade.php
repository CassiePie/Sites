@extends('layouts.default')

@section('title', 'Posts')

@section('content')
    <section>
        <h2>Posts</h2>
        <div class="posts-list">
            @forelse ($posts as $post)
                @include('posts.includes.post-small', ['post' => $post])
            @empty
                <p>No posts have been added yet.</p>
            @endforelse
        </div>
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
