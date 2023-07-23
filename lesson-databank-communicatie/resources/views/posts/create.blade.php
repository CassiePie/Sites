@extends('layouts.default')

@section('title', 'Add new post')

@section('content')
    <section>
        <h2>Add new post</h2>

        <form action="/posts" method="post">
            @include('posts.includes.form', ['buttonText' => "Add"])
        </form>
    </section>
@endsection
