@extends('layouts.default')

@section('title', 'My games')

@section('content')

    <div class="py-4">
        <a class="bg-green-200 hover:bg-green-300 text-green-600 px-4 py-2 inline-block" href="{{ route('games.create') }}">Add new game &rarr;</a>
    </div>

    <h2 class="text-4xl font-semibold mb-4">Games</h2>

    @include('games.includes.game-table', ['games' => $games])

@endsection
