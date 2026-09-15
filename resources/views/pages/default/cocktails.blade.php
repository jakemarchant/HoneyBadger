<x-layouts.structure>

    <x-slot name="title">{{ page_field('cocktails', 'page_title', 'Cocktails | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('cocktails', 'meta_description', 'Signature and classic cocktails at HoneyBadger Norwich, a bold café-bar on Red Lion Street, Norwich. Evening drinks, opening-party cocktails and seasonal specials.') }}</x-slot>
    <x-slot name="image">{{ page_image('cocktails', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('cocktails', 'hero_eyebrow', 'Evening drinks') }}</div>
                    <x-editable-heading page="cocktails" field="hero_heading" tag="h1" class="page-title">Cocktails at <em>HoneyBadger Norwich</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('cocktails', 'hero_intro', 'Gold dust, dark emerald, sharp serves and a bar that knows when to smile with teeth.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('cocktails', 'hero_cta_1', 'Reserve') }}</a><a class="btn-ghost"
                            href="{{ route('events') }}" wire:navigate>{{ page_field('cocktails', 'hero_cta_2', 'View Events') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('cocktails', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-gold rv">
                        <h2>{{ page_field('cocktails', 'panel1_heading', 'Signature Cocktails') }}</h2>
                        <p>{{ page_field('cocktails', 'panel1_body', 'HoneyBadger cocktails are bold, colourful and social — drinks with names people remember and flavours that carry the evening.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('cocktails', 'panel1_offers', [
                                ['label' => 'House signatures', 'description' => 'Bright, sharp and playful serves built around the HoneyBadger personality.'],
                                ['label' => 'Opening-party cocktails', 'description' => 'Easy-to-love drinks for the launch night crowd.'],
                                ['label' => 'Seasonal specials', 'description' => 'Fresh ideas that move with the weather, music and mood.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel texture-grunge rv">
                        <h2>{{ page_field('cocktails', 'panel2_heading', 'Classic Cocktails') }}</h2>
                        <p>{{ page_field('cocktails', 'panel2_body', 'The classics remain clean and familiar, with a HoneyBadger edge: polished enough for guests who know what they like, lively enough for those trying something new.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('cocktails', 'panel2_offers', [
                                ['label' => 'Refreshing', 'description' => 'Mojito, Daiquiri, Margarita and Spritz-style favourites.'],
                                ['label' => 'After-dark', 'description' => 'Espresso Martini, Negroni, Old Fashioned and Whiskey Sour style serves.'],
                                ['label' => 'For groups', 'description' => 'Easy evening drinks for opening parties, birthdays and casual celebrations.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="photo-strip rv">
                    @foreach (page_field('cocktails', 'photos', [
                        ['image' => 'cocktails.jpeg', 'alt' => 'Signature cocktails at HoneyBadger Norwich'],
                        ['image' => 'cocktail-in-the-sun.jpeg', 'alt' => 'A HoneyBadger cocktail catching the evening sun'],
                        ['image' => 'featured-cocktails.jpeg', 'alt' => 'Featured cocktail with an orange twist'],
                        ['image' => 'new-york-sours-cocktails.jpeg', 'alt' => 'New York Sour cocktail'],
                        ['image' => 'pink-cocktails.jpeg', 'alt' => 'Two pink cocktails at HoneyBadger Norwich'],
                        ['image' => 'spicy-marg-cocktails.jpeg', 'alt' => 'Spicy margarita with a chilli garnish'],
                    ]) as $photo)
                        <figure><img src="{{ resolve_page_image($photo['image'], $photo['image']) }}" alt="{{ $photo['alt'] }}"></figure>
                    @endforeach
                </div>
                <div class="quote-strip rv">
                    @foreach (page_field('cocktails', 'quotes', [
                        ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                        ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                        ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
                    ]) as $quote)
                        <div class="quote-card"><strong>{{ $quote['quote'] }}</strong><span>{{ $quote['attribution'] }}</span></div>
                    @endforeach
                </div>
                <div class="cta rv">
                    <h2>{{ page_field('cocktails', 'cta_heading', 'Opening Party cocktails') }}</h2>
                    <p>{{ page_field('cocktails', 'cta_body', 'Join us on 11 July for colourful drinks, kitchen energy and an evening live band. Evening tables are best reserved.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('cocktails', 'cta_1', 'Reserve for Opening Party') }}</a><a
                            class="btn-ghost" href="{{ route('home') }}" wire:navigate>{{ page_field('cocktails', 'cta_2', 'Back to Home') }}</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
