<x-layouts.structure>

    <x-slot name="title">{{ page_field('welcome', 'page_title', 'HoneyBadger Norwich | Café · Kitchen · Cocktails') }}</x-slot>
    <x-slot name="description">{{ page_field('welcome', 'meta_description', 'HoneyBadger Norwich is a vibrant café, kitchen and cocktail bar on Red Lion Street, Norwich — coffee by day, cocktails by night, with food, milkshakes and an opening party on 11 July.') }}</x-slot>
    <x-slot name="image">{{ page_image('welcome', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">

        <section class="hero" id="top">
            <div class="hero-content">
                <div class="hero-logo rv on"><img src="{{ page_image('welcome', 'hero_image', 'honeybadger-logo.png') }}"
                        alt="HoneyBadger Norwich logo"></div>
                <div class="eyebrow rv on">{{ page_field('welcome', 'hero_eyebrow', '1 Red Lion Street · Norwich') }}</div>
                <h1 class="rv on">
                    {{ page_field('welcome', 'hero_line1', 'A vicious little bastard of a café-bar.') }}
                    <em style="color:var(--green-p)">{{ page_field('welcome', 'hero_line2_em', 'Dressed in emerald.') }}</em>
                    <br>
                    <em>{{ page_field('welcome', 'hero_line3_em', 'Dipped in gold.') }}</em>
                </h1>
                <div class="stamp rv on">{{ page_field('welcome', 'hero_stamp', 'Opening Party · 11 July') }}</div>
                <p class="rv on">{{ page_field('welcome', 'hero_intro', 'Coffee by day. Cocktails by night. Milkshakes, smoothies, sandwiches, wine and spirits in between. Small place, big bite, good manners and absolutely no limp little corners.') }}</p>
                <div class="hero-ctas rv on"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('welcome', 'hero_cta_1', 'Book for Opening Party') }}</a><a class="btn-gr" href="{{ route('coffee') }}" wire:navigate>{{ page_field('welcome', 'hero_cta_2', 'View Coffee & Iced Drinks') }}</a><a
                        class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>{{ page_field('welcome', 'hero_cta_3', 'Explore Cocktails') }}</a></div>
            </div>
        </section>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-gold">
            <div class="wrap poster rv">
                <div class="poster-art" style="background-image: url('{{ page_image('welcome', 'poster_bg_image', 'jazz-night-3.jpeg') }}')">
                    <x-editable-heading page="welcome" field="poster_title" tag="div" class="poster-title">Opening <em>Party</em></x-editable-heading>
                </div>
                <div class="poster-info">
                    <span class="s-lbl">{{ page_field('welcome', 'poster_label', '11 July') }}</span>
                    <x-editable-heading page="welcome" field="poster_heading" tag="h2" class="s-h2">All-day launch. <em>Evening live band.</em></x-editable-heading>
                    <p>{{ page_field('welcome', 'poster_body', 'The badger wakes properly: coffee, kitchen, colourful drinks, cocktails and an evening live band. A little wild, a little polished, all HoneyBadger.') }}</p>
                    <ul class="offer">
                        @foreach (page_field('welcome', 'poster_offers', [
                            ['label' => 'Daytime', 'description' => 'Coffee, iced drinks, smoothies, milkshakes, sandwiches and golden launch energy.'],
                            ['label' => 'Evening', 'description' => 'Cocktails, live band and tables worth reserving.'],
                            ['label' => 'House note', 'description' => 'Good manners encouraged. Boring corners not invited.'],
                        ]) as $offer)
                            <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                        @endforeach
                    </ul>
                    <div class="page-actions"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('welcome', 'poster_cta_1', 'Book for Opening Party') }}</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>{{ page_field('welcome', 'poster_cta_2', 'View Events') }}</a></div>
                </div>
            </div>
        </section>


        <section class="section dark textured-geo">
            <div class="wrap">
                <div class="deals-board rv">
                    <div class="deals-poster" style="background-image:url('{{ page_image('welcome', 'deals_bg_image', 'smile-with-teeth.jpg') }}')">
                        <div class="deals-stamp">{{ page_field('welcome', 'deals_stamp', 'Badger Hours') }}</div>
                        <x-editable-heading page="welcome" field="deals_heading" tag="h2">Happy Hours <em>with teeth.</em></x-editable-heading>
                        <p>{{ page_field('welcome', 'deals_body', 'Rotating coffee, cocktail, wine, spirit and food deals for the hours when Norwich needs a little bite.') }}</p>
                    </div>
                    <div class="deals-list">
                        @foreach (page_field('welcome', 'deals_cards', [
                            ['time' => 'Rotating offers', 'title' => 'Coffee Claws · Cocktail Bite · Snack Attack', 'copy' => 'The offers will move with the day: daytime coffee, afternoon snacks, after-work cocktails and evening pours.'],
                            ['time' => 'Ask at the bar', 'title' => 'Today’s Bite', 'copy' => 'Deals may change by day, hour and mood. Come in, check the board, and let the badger show its teeth.'],
                        ]) as $deal)
                            <article class="deal-card">
                                <div class="deal-time">{{ $deal['time'] }}</div>
                                <h2 class="deal-title">{{ $deal['title'] }}</h2>
                                <p class="deal-copy">{{ $deal['copy'] }}</p>
                            </article>
                        @endforeach
                        <div class="page-actions"><a class="btn-g" href="{{ route('happy_hour') }}" wire:navigate>{{ page_field('welcome', 'deals_cta_1', 'View Badger Hours') }}</a><a
                                class="btn-ghost" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('welcome', 'deals_cta_2', 'Reserve') }}</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section cream textured-honey">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">{{ page_field('welcome', 'dayflow_label', 'The Day Flow') }}</span>
                    <x-editable-heading page="welcome" field="dayflow_heading" tag="h2" class="s-h2">Morning bite. <em>Afternoon swagger.</em></x-editable-heading>
                    <p class="lead">{{ page_field('welcome', 'dayflow_lead', 'The room changes with the hour: bright in the morning, hungry by afternoon, sharper after dark.') }}</p>
                </div>
                <div class="rhythm rv">
                    @foreach (page_field('welcome', 'rhythm_steps', [
                        ['title' => 'Morning', 'body' => 'Coffee in the claws, iced drinks on the counter, smoothies for the bright-eyed and breakfast-time wanderers.', 'bg_image' => 'coffee.jpeg'],
                        ['title' => 'Afternoon', 'body' => 'Sandwiches, shakes, light bites and that golden little hour when hunger starts barking.', 'bg_image' => 'sandwiches.jpg'],
                        ['title' => 'Evening', 'body' => 'Cocktails, wine, spirits, music and the darker gold-lit side of the room.', 'bg_image' => 'cocktails.jpeg'],
                    ]) as $step)
                        <div class="rhythm-step" @if ($step['bg_image'] ?? null) style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.88)), url('{{ resolve_page_image($step['bg_image'], $step['bg_image']) }}')" @endif>
                            <div class="rhythm-no">{{ sprintf('%02d', $loop->iteration) }}</div>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section dark textured-grunge" id="menu">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">{{ page_field('welcome', 'menu_label', 'Menu Highlights') }}</span>
                    <x-editable-heading page="welcome" field="menu_heading" tag="h2" class="s-h2">Pick your poison. <em>Then follow the scent.</em></x-editable-heading>
                    <p class="lead">{{ page_field('welcome', 'menu_lead', 'Coffee, shakes, smoothies, food and cocktails each get their own little den. Easy to explore, dangerous to leave hungry.') }}</p>
                </div>
                <div class="grid-3">
                    @php
                        $menuCardChrome = [
                            ['texture' => null, 'watermark' => false],
                            ['texture' => 'texture-honey', 'watermark' => false],
                            ['texture' => null, 'watermark' => false],
                            ['texture' => 'texture-grunge', 'watermark' => false],
                            ['texture' => null, 'watermark' => true],
                            ['texture' => null, 'watermark' => true],
                        ];
                    @endphp
                    @foreach (page_field('welcome', 'menu_cards', [
                        ['bg_image' => 'coffee.jpeg', 'kicker' => 'Daytime', 'title' => 'Colourful Coffee & Iced Drinks', 'body' => 'Hot coffee, iced lattes, syrups, milk options and refreshing coffee coolers.', 'link_text' => 'View Coffee & Iced Drinks', 'link_url' => route('coffee')],
                        ['bg_image' => null, 'kicker' => 'Sweet & Fresh', 'title' => 'Milkshakes & Smoothies', 'body' => 'Thick shakes, fruit blends and bright drinks for sunny afternoons and easy catch-ups.', 'link_text' => 'See Milkshakes & Smoothies', 'link_url' => route('coffee')],
                        ['bg_image' => 'featured-cocktails.jpeg', 'kicker' => 'Evening', 'title' => 'Cocktails', 'body' => 'Signature serves, classics and an evening atmosphere with a little gold dust in the glass.', 'link_text' => 'Explore Cocktails', 'link_url' => route('cocktails')],
                        ['bg_image' => null, 'kicker' => 'Kitchen', 'title' => 'Sandwiches & Food', 'body' => 'Fresh sandwiches, light bites and opening-party kitchen favourites.', 'link_text' => 'View Food', 'link_url' => route('food')],
                        ['bg_image' => 'aslan-martinis.jpeg', 'kicker' => 'Bar', 'title' => 'Wine & Spirits', 'body' => 'Wine by the glass or bottle, spirits for the evening and a grown-up finish.', 'link_text' => 'View Wine & Spirits', 'link_url' => route('cocktails')],
                        ['bg_image' => 'aslan-mural-portrait.jpeg', 'kicker' => 'Story', 'title' => 'Wounds Worn With Honour', 'body' => 'Scars, cobra bites, gold dust and Red Lion Street stubbornness: the full HoneyBadger chronicle.', 'link_text' => 'Read the Chronicle', 'link_url' => route('story')],
                    ]) as $card)
                        @php $chrome = $menuCardChrome[$loop->index] ?? ['texture' => null, 'watermark' => false]; @endphp
                        <article class="card {{ $chrome['texture'] }} rv" @if ($card['bg_image']) style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.90)), url('{{ resolve_page_image($card['bg_image'], $card['bg_image']) }}');background-size:cover;background-position:center" @endif>
                            @if ($chrome['watermark'])
                                <img class="watermark" src="{{ asset('/images/honeybadger-mark.png') }}" alt="">
                            @endif
                            <div>
                                <div class="kicker">{{ $card['kicker'] }}</div>
                                <h2>{{ $card['title'] }}</h2>
                                <p>{{ $card['body'] }}</p>
                            </div><a class="card-link" href="{{ $card['link_url'] }}" wire:navigate>{{ $card['link_text'] }}</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section white textured-emerald">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">{{ page_field('welcome', 'house_label', 'House Lines') }}</span>
                    <x-editable-heading page="welcome" field="house_heading" tag="h2" class="s-h2">Small place. <em>Big bite.</em></x-editable-heading>
                    <p class="lead">{{ page_field('welcome', 'house_lead', 'Warm welcome, sharp drinks, good manners and a room with teeth.') }}</p>
                </div>
                <div class="quote-strip rv">
                    @foreach (page_field('welcome', 'house_quotes', [
                        ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                        ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                        ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
                    ]) as $quote)
                        <div class="quote-card"><strong>{{ $quote['quote'] }}</strong><span>{{ $quote['attribution'] }}</span></div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section dark textured-geo">
            <div class="wrap two">
                <div class="panel texture-gold rv"><span class="s-lbl">{{ page_field('welcome', 'events_panel_label', 'Events') }}</span>
                    <x-editable-heading page="welcome" field="events_panel_heading" tag="h2" class="s-h2">Opening party first. <em>More nights after.</em></x-editable-heading>
                    <p>{{ page_field('welcome', 'events_panel_body', 'HoneyBadger is built for daytime visits, evening drinks and nights with a proper pulse.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('events') }}" wire:navigate>{{ page_field('welcome', 'events_panel_cta', 'View Events') }}</a></div>
                </div>
                <div class="panel texture-emerald rv"><span class="s-lbl">{{ page_field('welcome', 'visit_panel_label', 'Visit') }}</span>
                    <x-editable-heading page="welcome" field="visit_panel_heading" tag="h2" class="s-h2">Find us on <em>Red Lion Street.</em></x-editable-heading>
                    <p>{{ page_field('welcome', 'visit_panel_body', 'Reserve for the opening party, ask about events, or plan a daytime visit.') }}</p>
                    <div class="page-actions"><a class="btn-gr" href="{{ route('visit') }}#reserve" wire:navigate>{{ page_field('welcome', 'visit_panel_cta', 'Reserve a Table') }}</a></div>
                </div>
            </div>
        </section>#
    </x-slot>

</x-layouts.structure>
