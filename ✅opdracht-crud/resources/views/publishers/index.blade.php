@extends('layouts.default')

@section('title', 'Publishers')

@section('content')

    <div class="py-4">
        <a class="bg-green-200 hover:bg-green-300 text-green-600 px-4 py-2 inline-block" href="{{ route('publishers.create') }}">Add new publisher &rarr;</a>
    </div>

    <h2 class="text-4xl font-semibold mb-4">Publishers</h2>

    @include('publishers.includes.publisher-table')

@endsection
