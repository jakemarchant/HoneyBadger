<x-layouts.structure>

    <x-slot name="title">{{ page_field('events', 'page_title', 'Events | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('events', 'meta_description', 'Events at HoneyBadger Norwich: the opening party on 11 July, live music nights and social gatherings at our café-bar on Red Lion Street, Norwich.') }}</x-slot>
    <x-slot name="image">{{ page_image('events', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('events', 'hero_eyebrow', 'Events') }}</div>
                    <x-editable-heading page="events" field="hero_heading" tag="h1" class="page-title">Events at <em>HoneyBadger Norwich</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('events', 'hero_intro', 'Opening party first, then more daytime and evening events with coffee, food, cocktails, music and good company.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('events', 'hero_cta_1', 'Opening Party') }}</a><a
                            class="btn-ghost" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('events', 'hero_cta_2', 'Enquire') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('events', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-grunge">
            <div class="wrap">
                <div class="grid-3">
                    @foreach (page_field('events', 'event_cards', [
                        ['bg_image' => 'jazz-night.jpeg', 'kicker' => 'Upcoming', 'title' => 'HoneyBadger Opening Party', 'body' => '11 July. All-day launch with coffee, kitchen, colourful drinks, cocktails and an evening live band.', 'link_text' => 'Book for Opening Party', 'link_url' => route('opening_party')],
                        ['bg_image' => 'jazz-night-2.jpeg', 'kicker' => 'Coming Next', 'title' => 'Live Music Nights', 'body' => 'Small, lively nights with music, drinks and the kind of atmosphere that does not need shouting.', 'link_text' => 'Enquire', 'link_url' => route('visit').'#reserve'],
                        ['bg_image' => 'champagne.jpeg', 'kicker' => 'Past & Future', 'title' => 'Social Gatherings', 'body' => 'From daytime meetups to evening drinks, HoneyBadger is built for events with personality.', 'link_text' => 'Visit / Contact', 'link_url' => route('visit')],
                    ]) as $card)
                        <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.88)), url('{{ resolve_page_image($card['bg_image'], $card['bg_image']) }}');background-size:cover;background-position:center"><img class="watermark" src="{{ asset('/images/honeybadger-mark.png') }}"
                                alt="">
                            <div>
                                <div class="kicker">{{ $card['kicker'] }}</div>
                                <h2>{{ $card['title'] }}</h2>
                                <p>{{ $card['body'] }}</p>
                            </div><a class="card-link" href="{{ $card['link_url'] }}" wire:navigate>{{ $card['link_text'] }}</a>
                        </article>
                    @endforeach
                </div>
                <div class="quote-strip rv">
                    @foreach (page_field('events', 'quotes', [
                        ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                        ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                        ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
                    ]) as $quote)
                        <div class="quote-card"><strong>{{ $quote['quote'] }}</strong><span>{{ $quote['attribution'] }}</span></div>
                    @endforeach
                </div>
                <div class="cta rv">
                    <h2>{{ page_field('events', 'cta_heading', 'Plan an event') }}</h2>
                    <p>{{ page_field('events', 'cta_body', 'Ask us about evening tables, opening party bookings, music nights or a social gathering at HoneyBadger.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('events', 'cta_1', 'Reserve / Enquire') }}</a><a
                            class="btn-ghost" href="{{ route('home') }}" wire:navigate>{{ page_field('events', 'cta_2', 'Back to Home') }}</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
