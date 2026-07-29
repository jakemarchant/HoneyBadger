<x-layouts.structure>

    <x-slot name="title">Opening Party</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">11 July</div>
                    <h1 class="page-title">
                        HoneyBadger <em>Opening Party</em>
                    </h1>
                    <p class="page-intro">
                        The badger wakes properly: all-day coffee, kitchen favourites, colourful
                        drinks, cocktails and an evening live band. Evening tables are best reserved.
                    </p>
                    <div class="page-actions">
                        <a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve for Opening Party</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>View Events</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-gold">
            <div class="wrap poster rv">
                <div class="poster-art" style="background-image: linear-gradient(rgba(13,12,8,.62), rgba(13,12,8,.86)), url('{{ asset('/images/jazz-night.jpeg') }}')"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                    <div class="poster-title">
                        11 July <em>Launch</em>
                    </div>
                </div>
                <div class="poster-info"><span class="s-lbl">Featured Event</span>
                    <h2 class="s-h2">
                        All-day buzz. 
                        <em>Evening band.</em>
                    </h2>
                    <p>
                        Daytime coffee and kitchen energy rolls into cocktails, live music and the first proper
                        HoneyBadger night.
                    </p>
                    <ul class="offer">
                        <li>
                            <strong>Morning to Afternoon</strong>
                            Coffee, iced drinks, smoothies, milkshakes and sandwiches.
                        </li>
                        <li>
                            <strong>Evening</strong>
                            Cocktails, live band and a vibrant opening crowd.
                        </li>
                        <li>
                            <strong>Reservations</strong>
                            Recommended for evening tables and groups.
                        </li>
                    </ul>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve Now</a>
                    </div>
                </div>
            </div>
            <div class="cta rv">
                <h2>Reserve your opening-night table</h2>
                <p>Opening night carries the full HoneyBadger spirit: colourful, social, warm and a little wild around
                    the edges.</p>
                <div class="hero-ctas">
                    <a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>
                        Reserve Now
                    </a>
                    <a class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>
                        Explore Cocktails
                    </a>
                </div>
            </div>
            <div class="links">
                <a href="{{ route('coffee') }}" wire:navigate>Coffee & Iced Drinks</a>
                <a href="{{ route('food') }}" wire:navigate>Food</a>
                <a href="{{ route('events') }}" wire:navigate>Events</a>
                <a href="{{ route('home') }}" wire:navigate>Home</a>
            </div>
        </section>

    </x-slot>
</x-layouts.structure>
