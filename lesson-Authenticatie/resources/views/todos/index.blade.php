@extends('layouts.default')

@section('title', 'My todo list')

@section('content')
    @include('todos.includes.add-todo')

    <div class="grid gap-2">
        @forelse($todos as $todo)
            @include('todos.includes.todo-item', ['todo' => $todo])
        @empty
            <p>Nothing to do...</p>
        @endforelse
    </div>

    <div class="grid gap-2 mt-8 pt-8 border-t border-gray-200">
        @forelse($completedTodos as $todo)
            @include('todos.includes.todo-item', ['todo' => $todo])
        @empty
            <p>No completed items yet...</p>
        @endforelse
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('logout') }}" class="text-blue-500 underline">logout</a>
    </div>
@endsection
