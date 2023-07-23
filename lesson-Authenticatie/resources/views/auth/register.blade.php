@extends('layouts.default')

@section('title', 'Create your todo list')

@section('content')
    <form action="{{ route('register.post') }}" method="post" class="grid gap-2 w-96" novalidate>
        @csrf
        <div>
            <label for="name" class="block">Name</label>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <input type="text" class="block w-full rounded p-2 bg-gray-100" value="{{ old('name') }}" name="name">
        </div>
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
            <label for="password_confirmation" class="block">Password confirmation</label>
            @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <input type="password" class="block w-full rounded p-2 bg-gray-100" value="{{ old('password_confirmation') }}" name="password_confirmation">
        </div>
        <div>
            <input type="submit" value="Register" class="block w-full text-green-700 rounded bg-green-200 p-2">
        </div>
    </form>
    <p class="text-center mt-2">
        or <a href="{{ route('login.get') }}" class="text-blue-500 underline">login to your account</a>
    </p>
@endsection
