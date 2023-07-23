@extends('layouts.default')

@section('title', 'Edit game')

@section('content')

    @include('games.includes.back-to-list', ['showLink' => true])

    <h2 class="text-4xl font-semibold mb-4">Edit game</h2>

    <form class="bg-gray-100 shadow-2xl p-4 rounded-lg" action="{{ route('games.update', $game->id) }}" method="post">
        
        @csrf
        @method('PUT')
        @include('games.includes.form', [
            'buttonText' => 'Edit game',
            'game' => $game
        ])
    </form>
@endsection
