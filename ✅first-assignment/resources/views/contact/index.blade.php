@extends('layouts.basic')
{{-- <!DOCTYPE HTML> --}}
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
{{-- <html> --}}

{{-- <head>
    <title>Generic - Stellar by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head> --}}

{{-- <body class="is-preload"> --}}

    <!-- Wrapper -->
    {{-- <div id="wrapper"> --}}

        <!-- Header -->
        {{-- <header id="header">
            <h1>Generic</h1>
            <p>Ipsum dolor sit amet nullam</p>
        </header> --}}

        <!-- Nav -->
        {{-- <nav id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="getstarted.html" class="active">Get Started</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav> --}}

        <!-- Main -->
        {{-- <div id="main"> --}}
        
            <!-- Content -->
        @section('content')
        @include('includes.contactOuterSection')
            {{-- <section id="content" class="main">
                <span class="image main"><img src="{{ asset('images/pic04.jpg') }}" alt="" /></span>

                <h2>Contact us</h2>
                <p>Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis. Praesent rutrum sem diam, vitae egestas enim auctor sit amet. Pellentesque leo mauris, consectetur
                    id ipsum sit amet, fergiat. Pellentesque in mi eu massa lacinia malesuada et a elit. Donec urna ex, lacinia in purus ac, pretium pulvinar mauris. Curabitur sapien risus, commodo eget turpis at, elementum convallis fames ac ante ipsum
                    primis in faucibus.</p>

                <section>
                    <h2>Form</h2>
                    <form method="post" action="#">
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="name" id="name" value="" placeholder="Name" />
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="email" name="email" id="email" value="" placeholder="Email" />
                            </div>
                            <div class="col-12">
                                <select name="category" id="category">
                                        <option value="">- Category -</option>
                                        <option value="1">Manufacturing</option>
                                        <option value="1">Shipping</option>
                                        <option value="1">Administration</option>
                                        <option value="1">Human Resources</option>
                                    </select>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="priority-low" name="priority" checked>
                                <label for="priority-low">Low</label>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="priority-normal" name="priority">
                                <label for="priority-normal">Normal</label>
                            </div>
                            <div class="col-4 col-12-small">
                                <input type="radio" id="priority-high" name="priority">
                                <label for="priority-high">High</label>
                            </div>
                            <div class="col-6 col-12-small">
                                <input type="checkbox" id="copy" name="copy">
                                <label for="copy">Email me a copy</label>
                            </div>
                            <div class="col-6 col-12-small">
                                <input type="checkbox" id="human" name="human">
                                <label for="human">Not a robot</label>
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Send Message" class="primary" /></li>
                                    <li><input type="reset" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </section> --}}
        @endsection
        {{-- </div> --}}

        <!-- Footer -->
        {{-- <footer id="footer">
            <section>
                <h2>Aliquam sed mauris</h2>
                <p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
            </section>
            <section>
                <h2>Etiam feugiat</h2>
                <dl class="alt">
                    <dt>Address</dt>
                    <dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
                    <dt>Phone</dt>
                    <dd>(000) 000-0000 x 0000</dd>
                    <dt>Email</dt>
                    <dd><a href="#">information@untitled.tld</a></dd>
                </dl>
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
                    <li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
                </ul>
            </section>
            <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer> --}}

    {{-- </div> --}}

    <!-- Scripts -->
    {{-- <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script> --}}

{{-- </body> --}}

{{-- </html> --}}