@extends('layouts.default')

@section('title', 'Login')

@section('content')
    <section>
        <h2>Register</h2>

        <p>
            <a href="{{ route('login.get') }}">Or login to your account</a>
        </p>

        <form action="{{ route('register.post') }}" method="post">
            @csrf
            <div class="form-content">
                <div class="form-element">
                    <div>
                        <label for="name">Full name</label>
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-element">
                    <div>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="text" name="email" id="email" value="{{ old('email') }}">
                </div>
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
                <div class="form-element">
                    <div>
                        <label for="password_confirmation">Password confirmation</label>
                        @error('password_confirmation')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <div>
                    <input type="submit" value="Registeer">
                </div>
            </div>
        </form>
    </section>
@endsection
