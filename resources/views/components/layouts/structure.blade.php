<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>

    <meta name="description"
        content="HoneyBadger Norwich is a vibrant café, kitchen and cocktail bar on Red Lion Street, with coffee, iced drinks, food, cocktails and an opening party on 11 July.">
    <meta property="og:title" content="HoneyBadger Norwich | Café · Kitchen · Cocktails">
    <meta property="og:description"
        content="HoneyBadger Norwich is a vibrant café, kitchen and cocktail bar on Red Lion Street, with coffee, iced drinks, food, cocktails and an opening party on 11 July.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('/images/honeybadger-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Cinzel:wght@400;600;700&family=Jost:wght@300;400;500&family=Special+Elite&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @livewireStyles
</head>

<body>
    <nav id="mnav">
        <div class="nav-logo">
            <a href="{{ route('home') }}" wire:navigate>
                <img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"/>
            </a>
        </div>
        <button class="menu-toggle" type="button" aria-label="Open menu">Menu</button>
        <ul class="nav-links">
            <li>
                <a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}" wire:navigate>
                    Home
                </a>
            </li>
            <li>
                <a class="{{  Route::is('opening_party') ? 'active' : '' }}" href="{{ route('opening_party') }}" wire:navigate>
                    Opening Party
                </a>
            </li>
            <li>
                <a class="{{  Route::is('happy_hour') ? 'active' : '' }}" href="{{ route('happy_hour') }}" wire:navigate>
                    Happy Hour
                </a>
            </li>
            <li>
                <a class="{{ Route::is('coffee') ? 'active' : '' }}" href="{{ route('coffee') }}" wire:navigate>Coffee</a>
            </li>
            <li><a class="{{  Route::is('cocktails') ? 'active' : '' }}" href="{{  route('cocktails') }}" wire:navigate>Cocktails</a></li>
            <li><a class="{{  Route::is('food') ? 'active' : '' }}" href="{{  route('food') }}" wire:navigate>Food</a></li>
            <li><a class="{{  Route::is('story') ? 'active' : '' }}" href="{{  route('story') }}" wire:navigate>Our Story</a></li>
            <li><a class="{{  Route::is('events') ? 'active' : '' }}" href="{{  route('events') }}" wire:navigate>Events</a></li>
            <li><a class="{{  Route::is('visit') ? 'active' : '' }}" href="{{ route('visit') }}" wire:navigate>Visit / Reserve</a></li>
        </ul>
        <a class="nav-cta" href="{{ route('visit') }}#reserve" wire:navigate>Reserve</a>
    </nav>

    {{ $content }}

 <footer>
        <div class="foot-art" aria-hidden="true"></div>
        <div class="foot-body">
            <div class="footer-logo"><img src="{{  asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            <div class="fname">HoneyBadger Norwich</div>
            <div class="ftag">Vicious little bastard. Beautiful little bar.</div>
            <div class="fnav"><a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}" wire:navigate>Home</a><a
                    href="{{ route('opening_party') }}" wire:navigate>Opening Party</a><a
                    href="{{ route('coffee') }}" wire:navigate>Coffee</a><a href="{{ route('cocktails') }}" wire:navigate>Cocktails</a><a
                    href="{{ route('food') }}" wire:navigate>Food</a><a href="{{ route('story') }}" wire:navigate>Our Story</a><a
                    href="{{ route('events') }}" wire:navigate>Events</a><a href="{{ route('visit') }}" wire:navigate>Visit /
                    Reserve</a><a href="{{ route('coffee') }}" wire:navigate>Milkshakes</a><a
                    href="{{ route('cocktails') }}" wire:navigate>Wine & Spirits</a><a href="https://www.instagram.com/honeybadgernorwich/"
                    target="_blank" rel="noopener">Instagram</a></div>
            <div class="copy">© HoneyBadger Norwich · 1 Red Lion Street, Norwich</div>
        </div>
    </footer>
    <script>
        const n = document.getElementById('mnav');
        const b = document.querySelector('.menu-toggle');
        window.addEventListener('scroll', () => {
            window.scrollY > 35 ? n.classList.add('scrolled') : n.classList.remove('scrolled')
        });
        if (b) {
            b.addEventListener('click', () => n.classList.toggle('open'));
        }
        const r = new IntersectionObserver(e => {
            e.forEach(x => {
                if (x.isIntersecting) x.target.classList.add('on')
            })
        }, {
            threshold: .12
        });
        document.querySelectorAll('.rv').forEach(x => r.observe(x));
        document.querySelectorAll('form[data-mailto]').forEach(f => {
            f.addEventListener('submit', e => {
                e.preventDefault();
                const d = new FormData(f);
                let lines = [];
                d.forEach((v, k) => lines.push(k + ': ' + v));
                location.href = f.dataset.mailto + '?subject=' + encodeURIComponent(f.dataset.subject ||
                    'HoneyBadger Norwich enquiry') + '&body=' + encodeURIComponent(lines.join('\n'))
            })
        });
    </script>

    @livewireScripts
</body>

</html>
