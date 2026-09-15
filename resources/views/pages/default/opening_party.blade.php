<x-layouts.structure>

    <x-slot name="title">{{ page_field('opening_party', 'page_title', 'Opening Party | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('opening_party', 'meta_description', 'Join the HoneyBadger Norwich opening party on 11 July — all-day coffee and kitchen favourites into evening cocktails and a live band. Reserve your table on Red Lion Street.') }}</x-slot>
    <x-slot name="image">{{ page_image('opening_party', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('opening_party', 'hero_eyebrow', '11 July') }}</div>
                    <x-editable-heading page="opening_party" field="hero_heading" tag="h1" class="page-title">HoneyBadger <em>Opening Party</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('opening_party', 'hero_intro', 'The badger wakes properly: all-day coffee, kitchen favourites, colourful drinks, cocktails and an evening live band. Evening tables are best reserved.') }}</p>
                    <div class="page-actions">
                        <a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('opening_party', 'hero_cta_1', 'Reserve for Opening Party') }}</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>{{ page_field('opening_party', 'hero_cta_2', 'View Events') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('opening_party', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-gold">
            <div class="wrap poster rv">
                <div class="poster-art" style="background-image: linear-gradient(rgba(13,12,8,.62), rgba(13,12,8,.86)), url('{{ page_image('opening_party', 'poster_bg_image', 'jazz-night.jpeg') }}')"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                    <x-editable-heading page="opening_party" field="poster_title" tag="div" class="poster-title">11 July <em>Launch</em></x-editable-heading>
                </div>
                <div class="poster-info"><span class="s-lbl">{{ page_field('opening_party', 'poster_label', 'Featured Event') }}</span>
                    <x-editable-heading page="opening_party" field="poster_heading" tag="h2" class="s-h2">All-day buzz. <em>Evening band.</em></x-editable-heading>
                    <p>
                        {{ page_field('opening_party', 'poster_body', 'Daytime coffee and kitchen energy rolls into cocktails, live music and the first proper HoneyBadger night.') }}
                    </p>
                    <ul class="offer">
                        @foreach (page_field('opening_party', 'poster_offers', [
                            ['label' => 'Morning to Afternoon', 'description' => 'Coffee, iced drinks, smoothies, milkshakes and sandwiches.'],
                            ['label' => 'Evening', 'description' => 'Cocktails, live band and a vibrant opening crowd.'],
                            ['label' => 'Reservations', 'description' => 'Recommended for evening tables and groups.'],
                        ]) as $offer)
                            <li>
                                <strong>{{ $offer['label'] }}</strong>
                                {{ $offer['description'] }}
                            </li>
                        @endforeach
                    </ul>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('opening_party', 'poster_cta', 'Reserve Now') }}</a>
                    </div>
                </div>
            </div>
            <div class="cta rv">
                <h2>{{ page_field('opening_party', 'cta_heading', 'Reserve your opening-night table') }}</h2>
                <p>{{ page_field('opening_party', 'cta_body', 'Opening night carries the full HoneyBadger spirit: colourful, social, warm and a little wild around the edges.') }}</p>
                <div class="hero-ctas">
                    <a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>
                        {{ page_field('opening_party', 'cta_1', 'Reserve Now') }}
                    </a>
                    <a class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>
                        {{ page_field('opening_party', 'cta_2', 'Explore Cocktails') }}
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
