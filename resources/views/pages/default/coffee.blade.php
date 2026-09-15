<x-layouts.structure>

    <x-slot name="title">{{ page_field('coffee', 'page_title', 'Coffee & Iced Drinks | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('coffee', 'meta_description', 'Coffee, iced drinks, milkshakes and smoothies at HoneyBadger Norwich, Red Lion Street. Daytime drinks made for regulars, quick meetings and sunny afternoons.') }}</x-slot>
    <x-slot name="image">{{ page_image('coffee', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('coffee', 'hero_eyebrow', 'Daytime drinks') }}</div>
                    <x-editable-heading page="coffee" field="hero_heading" tag="h1" class="page-title">Coffee & Iced Drinks <em>in Norwich</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('coffee', 'hero_intro', 'Coffee in the claws, iced drinks on the counter and enough flavour to wake the street before the cocktails start growling.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>{{ page_field('coffee', 'hero_cta_1', 'Visit HoneyBadger') }}</a><a class="btn-ghost"
                            href="{{ route('coffee') }}#milkshakes" wire:navigate>{{ page_field('coffee', 'hero_cta_2', 'See Milkshakes') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('coffee', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-emerald">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-emerald rv">
                        <h2>{{ page_field('coffee', 'panel1_heading', 'Hot Coffee') }}</h2>
                        <p>{{ page_field('coffee', 'panel1_body', 'Start simple, go rich, or make it flavoured. HoneyBadger coffee is made for daytime regulars, quick meetings and slow little pauses before the day bares its teeth.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('coffee', 'panel1_offers', [
                                ['label' => 'Core coffees', 'description' => 'Espresso, Americano, flat white, cappuccino, latte and macchiato-style favourites.'],
                                ['label' => 'Comfort drinks', 'description' => 'Hot chocolate, chai, dirty chai and other warm favourites.'],
                                ['label' => 'Choice', 'description' => 'Decaf available where possible.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel texture-honey rv">
                        <h2>{{ page_field('coffee', 'panel2_heading', 'Iced Coffee Drinks') }}</h2>
                        <p>{{ page_field('coffee', 'panel2_body', 'Cold, smooth and colourful — made for sunny afternoons, takeaway walks and a bright little lift.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('coffee', 'panel2_offers', [
                                ['label' => 'Iced favourites', 'description' => 'Iced latte, iced mocha and iced caramel-style drinks.'],
                                ['label' => 'Syrups', 'description' => 'Vanilla, roasted hazelnut, caramel, salted caramel, peppermint and cherry.'],
                                ['label' => 'Milk options', 'description' => 'Semi-skimmed, skimmed, oat, soya and coconut milk options.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="two" id="milkshakes" style="margin-top:3rem">
                    <div class="panel texture-gold rv">
                        <h2>{{ page_field('coffee', 'panel3_heading', 'Milkshakes & Smoothies') }}</h2>
                        <p>{{ page_field('coffee', 'panel3_body', 'Thick shakes and bright fruit blends for sunny afternoons, quick refuels and easy catch-ups.') }}</p>
                        <ul class="offer">
                            @foreach (page_field('coffee', 'panel3_offers', [
                                ['label' => 'Milkshakes', 'description' => 'Classic and flavoured shakes, thick enough to earn the spoon.'],
                                ['label' => 'Smoothies', 'description' => 'Fresh fruit blends for a lighter, brighter lift.'],
                                ['label' => 'Best time', 'description' => 'Afternoon favourites, perfect alongside a sandwich.'],
                            ]) as $offer)
                                <li><strong>{{ $offer['label'] }}</strong>{{ $offer['description'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <figure class="feature-photo rv">
                        <img src="{{ page_image('coffee', 'feature_photo', 'coffee.jpeg') }}" alt="{{ page_field('coffee', 'feature_photo_alt', 'Turkish coffee served at HoneyBadger Norwich') }}">
                    </figure>
                </div>
                <div class="rhythm rv">
                    @foreach (page_field('coffee', 'rhythm_steps', [
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
                <div class="cta rv">
                    <h2>{{ page_field('coffee', 'cta_heading', 'Daytime HoneyBadger') }}</h2>
                    <p>{{ page_field('coffee', 'cta_body', 'Come in for coffee, iced drinks, sandwiches, smoothies and a lighter daytime mood before the evening cocktails take over.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>{{ page_field('coffee', 'cta_1', 'Visit Us') }}</a><a class="btn-dark"
                            href="{{ route('food') }}" wire:navigate>{{ page_field('coffee', 'cta_2', 'View Food') }}</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
