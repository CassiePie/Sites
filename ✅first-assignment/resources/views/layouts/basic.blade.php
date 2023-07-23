
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        {{-- <title>Stellar by HTML5 UP</title> --}}
        @include('includes.title')
        {{-- <meta charset="utf-8" /> --}}
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" /> --}}
        @include('includes.metaTags')
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript> --}}
        @include('includes.cssLinks')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="is-preload">

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            @include('includes.headerBasic')
            {{-- <header id="header">
                <h1>Generic</h1>
                <p>Ipsum dolor sit amet nullam</p>
            </header> --}}

            <!-- Nav -->
            @include('includes.nav')
            

            <!-- Main -->
            <div id="main">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer id="footer">
                @include('includes.footer')
            </footer>

        </div>

        <!-- Scripts -->
        @include('includes.scripts')

    </body>
</html>