
<nav id="nav">
    <ul>
        <li><a href="{{ route('home')}}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('about')}}" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('getstarted')}}" class="{{ request()->is('get-started') ? 'active' : '' }}">Get Started</a></li>
        <li><a href="{{ route('contact')}}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
    </ul>
</nav>
