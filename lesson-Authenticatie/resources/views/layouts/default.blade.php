<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My todo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="height: 100vh" class="flex justify-center items-center bg-gray-100">

    <div>
        <div class="p-8 rounded shadow-2xl bg-white">
            <h1 class="text-2xl font-semibold text-center">@yield('title')</h1>
            <div class="mt-4">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
