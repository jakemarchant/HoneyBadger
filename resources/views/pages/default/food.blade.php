<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Kitchen & light bites</div>
                    <h1 class="page-title">Sandwiches & Food at <em>HoneyBadger Norwich</em></h1>
                    <p class="page-intro">Fresh sandwiches, light bites and kitchen energy for daytime hunger,
                        opening-party appetites and people who know a sad snack when they see one.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve</a><a class="btn-ghost"
                            href="{{ route('coffee') }}" wire:navigate>Coffee & Drinks</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-grunge">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-honey rv">
                        <h2>Sandwiches</h2>
                        <p>Simple, satisfying and made for daytime visitors who want something fresh without turning
                            lunch into a ceremony.</p>
                        <ul class="offer">
                            <li><strong>Fresh options</strong>Easy-to-enjoy sandwiches and café-style favourites.</li>
                            <li><strong>With drinks</strong>Pair with coffee, iced drinks, smoothies or wine depending
                                on the hour.</li>
                            <li><strong>All-day mood</strong>Food that supports the café energy without slowing it down.
                            </li>
                        </ul>
                    </div>
                    <div class="panel texture-emerald rv">
                        <h2>Light Bites & Opening Party Food</h2>
                        <p>The kitchen supports the HoneyBadger rhythm: casual daytime bites, social plates and
                            opening-party favourites.</p>
                        <ul class="offer">
                            <li><strong>Light bites</strong>Easy plates for sharing, snacking and settling in.</li>
                            <li><strong>Party energy</strong>Food that works with cocktails, music and a lively crowd.
                            </li>
                            <li><strong>No sad snacks</strong>Food with flavour, charm and enough bite to keep the
                                little bastard proud.</li>
                        </ul>
                    </div>
                </div>
                <div class="cta rv">
                    <h2>Food for the opening</h2>
                    <p>Join us on 11 July for an all-day opening event with coffee, kitchen favourites, colourful drinks
                        and cocktails.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>Book for Opening Party</a><a
                            class="btn-dark" href="{{ route('cocktails') }}" wire:navigate>View Drinks</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
