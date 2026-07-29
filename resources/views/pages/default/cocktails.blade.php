<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Evening drinks</div>
                    <h1 class="page-title">Cocktails at <em>HoneyBadger Norwich</em></h1>
                    <p class="page-intro">Gold dust, dark emerald, sharp serves and a bar that knows when to smile with
                        teeth.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve</a><a class="btn-ghost"
                            href="{{ route('events') }}" wire:navigate>View Events</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-gold rv">
                        <h2>Signature Cocktails</h2>
                        <p>HoneyBadger cocktails are bold, colourful and social — drinks with names people remember and
                            flavours that carry the evening.</p>
                        <ul class="offer">
                            <li><strong>House signatures</strong>Bright, sharp and playful serves built around the
                                HoneyBadger personality.</li>
                            <li><strong>Opening-party cocktails</strong>Easy-to-love drinks for the launch night crowd.
                            </li>
                            <li><strong>Seasonal specials</strong>Fresh ideas that move with the weather, music and
                                mood.</li>
                        </ul>
                    </div>
                    <div class="panel texture-grunge rv">
                        <h2>Classic Cocktails</h2>
                        <p>The classics remain clean and familiar, with a HoneyBadger edge: polished enough for guests
                            who know what they like, lively enough for those trying something new.</p>
                        <ul class="offer">
                            <li><strong>Refreshing</strong>Mojito, Daiquiri, Margarita and Spritz-style favourites.</li>
                            <li><strong>After-dark</strong>Espresso Martini, Negroni, Old Fashioned and Whiskey Sour
                                style serves.</li>
                            <li><strong>For groups</strong>Easy evening drinks for opening parties, birthdays and casual
                                celebrations.</li>
                        </ul>
                    </div>
                </div>
                <div class="photo-strip rv">
                    <figure><img src="{{ asset('/images/cocktails.jpeg') }}" alt="Signature cocktails at HoneyBadger Norwich"></figure>
                    <figure><img src="{{ asset('/images/cocktail-in-the-sun.jpeg') }}" alt="A HoneyBadger cocktail catching the evening sun"></figure>
                    <figure><img src="{{ asset('/images/featured-cocktails.jpeg') }}" alt="Featured cocktail with an orange twist"></figure>
                    <figure><img src="{{ asset('/images/new-york-sours-cocktails.jpeg') }}" alt="New York Sour cocktail"></figure>
                    <figure><img src="{{ asset('/images/pink-cocktails.jpeg') }}" alt="Two pink cocktails at HoneyBadger Norwich"></figure>
                    <figure><img src="{{ asset('/images/spicy-marg-cocktails.jpeg') }}" alt="Spicy margarita with a chilli garnish"></figure>
                </div>
                <div class="quote-strip rv">
                    <div class="quote-card"><strong>Vicious little bastard. Beautiful little bar.</strong><span>House
                            nature</span></div>
                    <div class="quote-card"><strong>Coffee in the claws. Cocktails after dark.</strong><span>All-day
                            bite</span></div>
                    <div class="quote-card"><strong>Good manners at the door. Sharp teeth behind the
                            bar.</strong><span>House rule</span></div>
                </div>
                <div class="cta rv">
                    <h2>Opening Party cocktails</h2>
                    <p>Join us on 11 July for colourful drinks, kitchen energy and an evening live band. Evening tables
                        are best reserved.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>Reserve for Opening Party</a><a
                            class="btn-ghost" href="{{ route('home') }}" wire:navigate>Back to Home</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
