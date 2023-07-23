<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body>

    <div class="container">
        <header>
            <h1>Databank communicatie</h1>
            <nav class="main-nav">
                <a href="/">Home</a>
                <a href="{{ route('posts.create') }}">Add new post</a>
                <a href="{{ route('users.profile') }}">My profile</a>
                @guest
                    <a href="{{ route('login.get') }}">Login</a>
                    <a href="{{ route('register.get') }}">Register</a>
                @endguest
                {{-- @auth --}}
                    {{-- <a href="{{ route('logout') }}">Logout</a> --}}
                {{-- @endauth --}}
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="main-footer">
            <p>Made with Laravel! <a href="{{ route('logout') }}">Logout</a></p>
        </footer>
    </div>

</body>
</html>
