<x-layouts.structure>

    <x-slot name="title">{{ page_field('food', 'page_title', 'Food | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('food', 'meta_description', 'Fresh sandwiches, light bites and kitchen favourites at HoneyBadger Norwich — daytime food to go with coffee, iced drinks or evening cocktails on Red Lion Street, Norwich.') }}</x-slot>
    <x-slot name="image">{{ page_image('food', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('food', 'hero_eyebrow', 'Kitchen & light bites') }}</div>
                    <x-editable-heading page="food" field="hero_heading" tag="h1" class="page-title">Sandwiches & Food at <em>HoneyBadger Norwich</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('food', 'hero_intro', 'Fresh sandwiches, light bites and kitchen energy for daytime hunger, opening-party appetites and people who know a sad snack when they see one.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('food', 'hero_cta_1', 'Reserve') }}</a><a class="btn-ghost"
                            href="{{ route('coffee') }}" wire:navigate>{{ page_field('food', 'hero_cta_2', 'Coffee & Drinks') }}</a></div>
                </div>
                <div class="logo-panel rv on">
                    <img src="{{ page_image('food', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                </div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-grunge">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-honey rv">
                        <h2>{{ page_field('food', 'panel1_heading', 'Sandwiches') }}</h2>
                        <p>{{ page_field('food', 'panel1_body', 'Simple, satisfying and made for daytime visitors who want something fresh without turning lunch into a ceremony.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('food', 'panel1_offers', [
                                ['label' => 'Fresh options', 'description' => 'Easy-to-enjoy sandwiches and café-style favourites.'],
                                ['label' => 'With drinks', 'description' => 'Pair with coffee, iced drinks, smoothies or wine depending on the hour.'],
                                ['label' => 'All-day mood', 'description' => 'Food that supports the café energy without slowing it down.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel texture-emerald rv">
                        <h2>{{ page_field('food', 'panel2_heading', 'Light Bites & Opening Party Food') }}</h2>
                        <p>{{ page_field('food', 'panel2_body', 'The kitchen supports the HoneyBadger rhythm: casual daytime bites, social plates and opening-party favourites.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('food', 'panel2_offers', [
                                ['label' => 'Light bites', 'description' => 'Easy plates for sharing, snacking and settling in.'],
                                ['label' => 'Party energy', 'description' => 'Food that works with cocktails, music and a lively crowd.'],
                                ['label' => 'No sad snacks', 'description' => 'Food with flavour, charm and enough bite to keep the little bastard proud.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="cta rv">
                    <h2>{{ page_field('food', 'cta_heading', 'Food for the opening') }}</h2>
                    <p>{{ page_field('food', 'cta_body', 'Join us on 11 July for an all-day opening event with coffee, kitchen favourites, colourful drinks and cocktails.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('food', 'cta_1', 'Book for Opening Party') }}</a><a
                            class="btn-dark" href="{{ route('cocktails') }}" wire:navigate>{{ page_field('food', 'cta_2', 'View Drinks') }}</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
