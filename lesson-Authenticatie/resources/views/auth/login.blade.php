@extends('layouts.default')

@section('title', 'Access your todo list')

@section('content')
    <form action="{{ route('login.post') }}" method="post" class="grid gap-2 w-96" novalidate>
        @csrf
        <div>
            <label for="email" class="block">Email address</label>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <input type="email" class="block w-full rounded p-2 bg-gray-100" value="{{ old('email') }}" name="email">
        </div>
        <div>
            <label for="password" class="block">Password</label>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <input type="password" class="block w-full rounded p-2 bg-gray-100" value="{{ old('password') }}" name="password">
        </div>
        <div>
            <input type="submit" value="Login" class="block w-full rounded text-green-700 bg-green-200 p-2">
        </div>
    </form>
    <p class="text-center mt-2">
        or <a href="{{ route('register.get') }}" class="text-blue-500 underline">register a new account</a>
    </p>
@endsection
