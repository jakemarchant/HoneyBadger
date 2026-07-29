<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Events</div>
                    <h1 class="page-title">Events at <em>HoneyBadger Norwich</em></h1>
                    <p class="page-intro">Opening party first, then more daytime and evening events with coffee, food,
                        cocktails, music and good company.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>Opening Party</a><a
                            class="btn-ghost" href="{{ route('visit') }}#reserve" wire:navigate>Enquire</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section dark textured-grunge">
            <div class="wrap">
                <div class="grid-3">
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.88)), url('{{ asset('/images/jazz-night.jpeg') }}');background-size:cover;background-position:center"><img class="watermark" src="{{ asset('/images/honeybadger-mark.png') }}"
                            alt="">
                        <div>
                            <div class="kicker">Upcoming</div>
                            <h2>HoneyBadger Opening Party</h2>
                            <p>11 July. All-day launch with coffee, kitchen, colourful drinks, cocktails and an evening
                                live band.</p>
                        </div><a class="card-link" href="{{ route('opening_party') }}" wire:navigate>Book for Opening Party</a>
                    </article>
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.90)), url('{{ asset('/images/jazz-night-2.jpeg') }}');background-size:cover;background-position:center"><img class="watermark" src="{{ asset('/images/honeybadger-mark.png') }}"
                            alt="">
                        <div>
                            <div class="kicker">Coming Next</div>
                            <h2>Live Music Nights</h2>
                            <p>Small, lively nights with music, drinks and the kind of atmosphere that does not need
                                shouting.</p>
                        </div><a class="card-link" href="{{ route('visit') }}#reserve" wire:navigate>Enquire</a>
                    </article>
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.66),rgba(13,12,8,.88)), url('{{ asset('/images/champagne.jpeg') }}');background-size:cover;background-position:center"><img class="watermark" src="{{ asset('/images/honeybadger-mark.png') }}"
                            alt="">
                        <div>
                            <div class="kicker">Past & Future</div>
                            <h2>Social Gatherings</h2>
                            <p>From daytime meetups to evening drinks, HoneyBadger is built for events with personality.
                            </p>
                        </div><a class="card-link" href="{{ route('visit') }}" wire:navigate>Visit / Contact</a>
                    </article>
                </div>
                <div class="quote-strip rv">
                    <div class="quote-card"><strong>Vicious little bastard. Beautiful little bar.</strong><span>House
                            nature</span></div>
                    <div class="quote-card"><strong>Coffee in the claws. Cocktails after dark.</strong><span>All-day
                            bite</span></div>
                    <div class="quote-card"><strong>Good manners at the door. Sharp teeth behind the
                            bar.</strong><span>House rule</span></div>
                </div>
                <div class="cta rv">
                    <h2>Plan an event</h2>
                    <p>Ask us about evening tables, opening party bookings, music nights or a social gathering at
                        HoneyBadger.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}#reserve" wire:navigate>Reserve / Enquire</a><a
                            class="btn-ghost" href="{{ route('home') }}" wire:navigate>Back to Home</a></div>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
