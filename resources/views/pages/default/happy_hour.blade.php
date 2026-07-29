<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Badger Hours</div>
                    <h1 class="page-title">Happy hours with <em>teeth.</em></h1>
                    <p class="page-intro">The clock hits the right hour, the badger sharpens its claws, and the bar
                        starts making little deals with your evening.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve a Table</a><a
                            class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>Explore Cocktails</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="deals-board rv">
                    <div class="deals-poster">
                        <img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                        <div class="deals-stamp">Coming to the counter</div>
                        <h2>Badger <em>Hours</em></h2>
                        <p>Rotating drinks and food offers for the hours when Norwich needs a little bite. Coffee first,
                            cocktails later, no sad little discounts dressed as excitement.</p>
                    </div>

                    <div class="deals-list">
                        <article class="deal-card">
                            <div class="deal-time">Weekday afternoons</div>
                            <h2 class="deal-title">Coffee Claws</h2>
                            <p class="deal-copy">Daytime coffee and iced drink offers for quick visits, slow pauses and
                                people who deserve better than beige caffeine.</p>
                        </article>
                        <article class="deal-card">
                            <div class="deal-time">After-work hours</div>
                            <h2 class="deal-title">Cocktail Bite</h2>
                            <p class="deal-copy">Selected cocktail offers when the day loosens its tie and the badger
                                starts smiling with teeth.</p>
                        </article>
                        <article class="deal-card">
                            <div class="deal-time">Golden hour</div>
                            <h2 class="deal-title">Wine & Spirit Pounce</h2>
                            <p class="deal-copy">Rotating wine, spirit and mixer offers for a slower, sharper finish to
                                the day.</p>
                        </article>
                        <article class="deal-card">
                            <div class="deal-time">Kitchen moments</div>
                            <h2 class="deal-title">Snack Attack</h2>
                            <p class="deal-copy">Food and drink pairings for sandwich hunters, light-bite grazers and
                                opening-party appetites.</p>
                        </article>
                        <p class="deal-note">Deals will rotate. Availability may change. Responsible service always
                            applies. Ask at the bar for today’s bite.</p>
                    </div>
                </div>

                <div class="photo-strip rv">
                    <figure><img src="{{ asset('/images/aslan-wine-table.jpeg') }}" alt="Wine served at HoneyBadger Norwich"></figure>
                    <figure><img src="{{ asset('/images/aslan-cocktail-mural.jpeg') }}" alt="Cocktails in front of the HoneyBadger mural"></figure>
                    <figure><img src="{{ asset('/images/aslan-pink-cocktail.jpeg') }}" alt="A pink cocktail at HoneyBadger Norwich"></figure>
                    <figure><img src="{{ asset('/images/aslan-cocktail-on-ice.jpeg') }}" alt="A HoneyBadger cocktail on ice"></figure>
                    <figure><img src="{{ asset('/images/aslan-daiquiri.jpeg') }}" alt="A daiquiri garnished with lemon"></figure>
                    <figure><img src="{{ asset('/images/aslan-cocktail-orange-twist-2.jpeg') }}" alt="A cocktail with an orange twist garnish"></figure>
                </div>
                <div class="badger-hours-strip rv">
                    <div class="badger-hour-mini"><span>Morning</span><strong>Coffee in the claws.</strong></div>
                    <div class="badger-hour-mini"><span>Afternoon</span><strong>Iced drinks and snack attacks.</strong>
                    </div>
                    <div class="badger-hour-mini"><span>After work</span><strong>Cocktails with a little bite.</strong>
                    </div>
                    <div class="badger-hour-mini"><span>Evening</span><strong>Wine, spirits and gold dust.</strong>
                    </div>
                </div>

                <div class="cta rv">
                    <h2>Want the day’s deal?</h2>
                    <p>Ask at the bar, watch the socials, or come in and let the badger decide what mood the hour
                        deserves.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve a Table</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>View Events</a></div>
                </div>

                <div class="links"><a href="{{ route('home') }}" wire:navigate>Home</a><a href="{{ route('cocktails') }}" wire:navigate>Cocktails</a><a
                        href="{{ route('coffee') }}" wire:navigate>Coffee</a><a href="{{ route('food') }}" wire:navigate>Food</a><a
                        href="{{ route('visit') }}" wire:navigate>Visit</a></div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
