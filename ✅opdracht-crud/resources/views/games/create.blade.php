@extends('layouts.default')

@section('title', 'Add new game')

@section('content')

    @include('games.includes.back-to-list')

    <h2 class="text-4xl font-semibold mb-4">Add new game</h2>

    <form class="bg-gray-100 shadow-2xl p-4 rounded-lg" action="{{ route('games.store') }}" method="POST">
        @csrf
        @include('games.includes.form', [
            'buttonText' => 'Add new game',
            'game' => $game
        ])
    </form>

@endsection
