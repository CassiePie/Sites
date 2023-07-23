<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mijn Tweede Website - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <header>
            <h1>Mijnn tweede website!</h1>

            @include('includes.nav')
        </header>
        <div>
            <main>
                @yield('content')
            </main>
            <aside>
                @yield('sidebar')
            </aside>

            <footer>Copyright</footer>
            
        </div>
    </div>
</body>
</html>