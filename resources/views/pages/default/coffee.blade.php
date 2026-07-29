<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">
        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Daytime drinks</div>
                    <h1 class="page-title">Coffee & Iced Drinks <em>in Norwich</em></h1>
                    <p class="page-intro">Coffee in the claws, iced drinks on the counter and enough flavour to wake the
                        street before the cocktails start growling.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>Visit HoneyBadger</a><a
                            class="btn-ghost" href="{{ route('coffee') }}#milkshakes" wire:navigate>See Milkshakes</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-emerald">
            <div class="wrap">
                <div class="two">
                    <div class="panel texture-emerald rv">
                        <h2>Hot Coffee</h2>
                        <p>Start simple, go rich, or make it flavoured. HoneyBadger coffee is made for daytime regulars,
                            quick meetings and slow little pauses before the day bares its teeth.</p>
                        <ul class="offer">
                            <li><strong>Core coffees</strong>Espresso, Americano, flat white, cappuccino, latte and
                                macchiato-style favourites.</li>
                            <li><strong>Comfort drinks</strong>Hot chocolate, chai, dirty chai and other warm
                                favourites.</li>
                            <li><strong>Choice</strong>Decaf available where possible.</li>
                        </ul>
                    </div>
                    <div class="panel texture-honey rv">
                        <h2>Iced Coffee Drinks</h2>
                        <p>Cold, smooth and colourful — made for sunny afternoons, takeaway walks and a bright little
                            lift.</p>
                        <ul class="offer">
                            <li><strong>Iced favourites</strong>Iced latte, iced mocha and iced caramel-style drinks.
                            </li>
                            <li><strong>Syrups</strong>Vanilla, roasted hazelnut, caramel, salted caramel, peppermint
                                and cherry.</li>
                            <li><strong>Milk options</strong>Semi-skimmed, skimmed, oat, soya and coconut milk options.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="two" id="milkshakes" style="margin-top:3rem">
                    <div class="panel texture-gold rv">
                        <h2>Milkshakes & Smoothies</h2>
                        <p>Thick shakes and bright fruit blends for sunny afternoons, quick refuels and easy
                            catch-ups.</p>
                        <ul class="offer">
                            <li><strong>Milkshakes</strong>Classic and flavoured shakes, thick enough to earn the
                                spoon.</li>
                            <li><strong>Smoothies</strong>Fresh fruit blends for a lighter, brighter lift.</li>
                            <li><strong>Best time</strong>Afternoon favourites, perfect alongside a sandwich.</li>
                        </ul>
                    </div>
                    <figure class="feature-photo rv">
                        <img src="{{ asset('/images/coffee.jpeg') }}" alt="Turkish coffee served at HoneyBadger Norwich">
                    </figure>
                </div>
                <div class="rhythm rv">
                    <div class="rhythm-step">
                        <div class="rhythm-no">01</div>
                        <h3>Morning</h3>
                        <p>Coffee in the claws, iced drinks on the counter, smoothies for the bright-eyed and
                            breakfast-time wanderers.</p>
                    </div>
                    <div class="rhythm-step">
                        <div class="rhythm-no">02</div>
                        <h3>Afternoon</h3>
                        <p>Sandwiches, shakes, light bites and that golden little hour when hunger starts barking.</p>
                    </div>
                    <div class="rhythm-step">
                        <div class="rhythm-no">03</div>
                        <h3>Evening</h3>
                        <p>Cocktails, wine, spirits, music and the darker gold-lit side of the room.</p>
                    </div>
                </div>
                <div class="cta rv">
                    <h2>Daytime HoneyBadger</h2>
                    <p>Come in for coffee, iced drinks, sandwiches, smoothies and a lighter daytime mood before the
                        evening cocktails take over.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>Visit Us</a><a class="btn-dark"
                            href="{{ route('food') }}" wire:navigate>View Food</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
