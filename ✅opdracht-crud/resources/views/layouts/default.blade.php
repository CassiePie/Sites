<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') -- Games</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="px-2 max-w-4xl mx-auto">
        <header class="py-4 flex justify-between items-center border-b border-gray-500">
            <nav class="text-lg flex gap-2 items-center lowercase">
                <a class="bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-900 px-4 py-1" href="{{ route('games.index') }}">Games</a>
                <a class="bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-900 px-4 py-1" href="{{ route('publishers.index') }}">Publishers</a>
            </nav>
            <h1 class="font-semibold uppercase text-2xl">My Games</h1>
        </header>

        <div>
            @yield('content')
        </div>
    </div>

</body>
</html>
