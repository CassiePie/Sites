@extends('layouts.default')

@section('title', 'Add new publisher')

@section('content')

    @include('publishers.includes.back-to-list')

    <h2 class="text-4xl font-semibold mb-4">Add new publisher</h2>
    <form class="bg-gray-100 shadow-2xl p-4 rounded-lg" action="{{ route('publishers.store') }}" method="post">

        @csrf
        @include('publishers.includes.form', [
            'buttonText' => 'Add new publisher',
            'publisher' => $publisher
        ])
    </form>

@endsection
