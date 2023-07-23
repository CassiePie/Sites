@extends('layouts.default')

@section('title', 'Publisher: Publisher name here')

@section('content')

    @include('publishers.includes.back-to-list')

    <h2 class="text-4xl font-semibold mb-4">{{ $publisher->name }}</h2>

    <div class="my-4">
        @include('publishers.includes.actions')
    </div>

    <div class="mt-12">
        <h3 class="mb-2 text-xl font-semibold">Games created by this publisher:</h3>
        @include('games.includes.game-table', ['games' => $publisher->games])

    </div>

@endsection
