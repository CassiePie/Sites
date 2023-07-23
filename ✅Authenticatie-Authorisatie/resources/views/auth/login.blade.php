@extends('layouts.default')

@section('title', 'Login')

@section('content')
    <section>
        <h2>Login</h2>

        <p>
            <a href="{{ route('register.get') }}">Or register for a new account</a>
        </p>

        <form action="{{ route('login.post') }}" method="post">
            @csrf
            <div class="form-content">
                <div class="form-element">
                    <div>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="username" id="username" value="{{ old('username') }}">
                </div>
                <div class="form-element">
                    <div>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" name="password" id="password">
                </div>

                <div>
                    <input type="submit" value="Login">
                </div>
            </div>
        </form>
    </section>
@endsection
