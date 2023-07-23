@extends('layouts.default')

@section('title', 'Edit post')

@section('content')
    <section>
        <h2>Edit post</h2>

        <p>
            <a href="/posts/{{ $post->id }}">Back to post</a>
        </p>

        <form action="{{ route('posts.update', $post) }}" method="post">
            @method('put')
            @include('posts.includes.form', ['buttonText' => "Update"])
        </form>
    </section>
@endsection
