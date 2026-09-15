<x-layouts.structure>

    <x-slot name="title">{{ page_field('happy_hour', 'page_title', 'Happy Hour | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('happy_hour', 'meta_description', 'Badger Hours: rotating coffee, cocktail, wine and food deals at HoneyBadger Norwich, Red Lion Street. Daytime coffee offers through to evening cocktail deals.') }}</x-slot>
    <x-slot name="image">{{ page_image('happy_hour', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('happy_hour', 'hero_eyebrow', 'Badger Hours') }}</div>
                    <x-editable-heading page="happy_hour" field="hero_heading" tag="h1" class="page-title">Happy hours with <em>teeth.</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('happy_hour', 'hero_intro', 'The clock hits the right hour, the badger sharpens its claws, and the bar starts making little deals with your evening.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('happy_hour', 'hero_cta_1', 'Reserve a Table') }}</a><a
                            class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>{{ page_field('happy_hour', 'hero_cta_2', 'Explore Cocktails') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('happy_hour', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="deals-board rv">
                    <div class="deals-poster" style="background-image:url('{{ page_image('happy_hour', 'deals_bg_image', 'happyhour.jpg') }}')">
                        <div class="deals-stamp">{{ page_field('happy_hour', 'deals_stamp', 'Coming to the counter') }}</div>
                        <x-editable-heading page="happy_hour" field="deals_heading" tag="h2">Badger <em>Hours</em></x-editable-heading>
                        <p>{{ page_field('happy_hour', 'deals_body', 'Rotating drinks and food offers for the hours when Norwich needs a little bite. Coffee first, cocktails later, no sad little discounts dressed as excitement.') }}</p>
                    </div>

                    <div class="deals-list">
                        @foreach (page_field('happy_hour', 'deal_cards', [
                            ['time' => 'Weekday afternoons', 'title' => 'Coffee Claws', 'copy' => 'Daytime coffee and iced drink offers for quick visits, slow pauses and people who deserve better than beige caffeine.', 'bg_image' => 'coffee.jpeg'],
                            ['time' => 'After-work hours', 'title' => 'Cocktail Bite', 'copy' => 'Selected cocktail offers when the day loosens its tie and the badger starts smiling with teeth.', 'bg_image' => 'cocktail-in-the-sun.jpeg'],
                            ['time' => 'Golden hour', 'title' => 'Wine & Spirit Pounce', 'copy' => 'Rotating wine, spirit and mixer offers for a slower, sharper finish to the day.', 'bg_image' => 'champagne.jpeg'],
                            ['time' => 'Kitchen moments', 'title' => 'Snack Attack', 'copy' => 'Food and drink pairings for sandwich hunters, light-bite grazers and opening-party appetites.', 'bg_image' => 'sandwiches.jpg'],
                        ]) as $deal)
                            <article class="deal-card" @if ($deal['bg_image'] ?? null) style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.90)), url('{{ resolve_page_image($deal['bg_image'], $deal['bg_image']) }}');background-size:cover;background-position:center" @endif>
                                <div class="deal-time">{{ $deal['time'] }}</div>
                                <h2 class="deal-title">{{ $deal['title'] }}</h2>
                                <p class="deal-copy">{{ $deal['copy'] }}</p>
                            </article>
                        @endforeach
                        <p class="deal-note">{{ page_field('happy_hour', 'deals_note', 'Deals will rotate. Availability may change. Responsible service always applies. Ask at the bar for today’s bite.') }}</p>
                    </div>
                </div>

                <div class="photo-strip rv">
                    @foreach (page_field('happy_hour', 'photos', [
                        ['image' => 'aslan-wine-table.jpeg', 'alt' => 'Wine served at HoneyBadger Norwich'],
                        ['image' => 'aslan-cocktail-mural.jpeg', 'alt' => 'Cocktails in front of the HoneyBadger mural'],
                        ['image' => 'aslan-pink-cocktail.jpeg', 'alt' => 'A pink cocktail at HoneyBadger Norwich'],
                        ['image' => 'aslan-cocktail-on-ice.jpeg', 'alt' => 'A HoneyBadger cocktail on ice'],
                        ['image' => 'aslan-daiquiri.jpeg', 'alt' => 'A daiquiri garnished with lemon'],
                        ['image' => 'aslan-cocktail-orange-twist-2.jpeg', 'alt' => 'A cocktail with an orange twist garnish'],
                    ]) as $photo)
                        <figure><img src="{{ resolve_page_image($photo['image'], $photo['image']) }}" alt="{{ $photo['alt'] }}"></figure>
                    @endforeach
                </div>
                <div class="badger-hours-strip rv">
                    @foreach (page_field('happy_hour', 'hours_strip', [
                        ['label' => 'Morning', 'text' => 'Coffee in the claws.'],
                        ['label' => 'Afternoon', 'text' => 'Iced drinks and snack attacks.'],
                        ['label' => 'After work', 'text' => 'Cocktails with a little bite.'],
                        ['label' => 'Evening', 'text' => 'Wine, spirits and gold dust.'],
                    ]) as $hour)
                        <div class="badger-hour-mini"><span>{{ $hour['label'] }}</span><strong>{{ $hour['text'] }}</strong></div>
                    @endforeach
                </div>

                <div class="cta rv">
                    <h2>{{ page_field('happy_hour', 'cta_heading', 'Want the day’s deal?') }}</h2>
                    <p>{{ page_field('happy_hour', 'cta_body', 'Ask at the bar, watch the socials, or come in and let the badger decide what mood the hour deserves.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('happy_hour', 'cta_1', 'Reserve a Table') }}</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>{{ page_field('happy_hour', 'cta_2', 'View Events') }}</a></div>
                </div>

                <div class="links"><a href="{{ route('home') }}" wire:navigate>Home</a><a href="{{ route('cocktails') }}" wire:navigate>Cocktails</a><a
                        href="{{ route('coffee') }}" wire:navigate>Coffee</a><a href="{{ route('food') }}" wire:navigate>Food</a><a
                        href="{{ route('visit') }}" wire:navigate>Visit</a></div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
