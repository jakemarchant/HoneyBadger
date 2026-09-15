<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>

    @php
        $metaDescription = $description ?? 'HoneyBadger Norwich is a vibrant café, kitchen and cocktail bar on Red Lion Street, Norwich, with coffee, iced drinks, food and cocktails.';
        $metaImage = $image ?? asset('/images/honeybadger-logo.png');
        $canonicalUrl = url()->current();
    @endphp

    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:title" content="{{ $title ?? '' }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:site_name" content="HoneyBadger Norwich">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? '' }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">

    <link rel="icon" href="{{ asset('/favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('/favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => ['CafeOrCoffeeShop', 'BarOrPub'],
            'name' => 'HoneyBadger Norwich',
            'image' => asset('/images/honeybadger-logo.png'),
            'url' => url('/'),
            'email' => 'bookings@thehoneybadgernorwich.co.uk',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '1 Red Lion Street',
                'addressLocality' => 'Norwich',
                'addressCountry' => 'GB',
            ],
            'sameAs' => [
                'https://www.instagram.com/honeybadgernorwich/',
            ],
            'servesCuisine' => ['Café', 'Cocktails', 'Coffee'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&display=swap"
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
        (function() {
            if (!window.__hbNavScrollBound) {
                window.__hbNavScrollBound = true;
                window.addEventListener('scroll', () => {
                    const nav = document.getElementById('mnav');
                    if (nav) window.scrollY > 35 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled')
                });
            }

            const n = document.getElementById('mnav');
            const b = document.querySelector('.menu-toggle');
            if (b && n) {
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
        })();
    </script>

    @livewireScripts
</body>

</html>
