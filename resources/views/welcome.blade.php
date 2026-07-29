<x-layouts.structure>

    <x-slot name="title">HoneyBadger Norwich | Café · Kitchen · Cocktails</x-slot>

    <x-slot name="content">

        <section class="hero" id="top">
            <div class="hero-content">
                <div class="hero-logo rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}"
                        alt="HoneyBadger Norwich logo"></div>
                <div class="eyebrow rv on">1 Red Lion Street · Norwich</div>
                <h1 class="rv on">
                    A vicious little bastard of a café-bar.
                    <em style="color:var(--green-p)">Dressed in emerald.</em>
                    <br>
                    <em>Dipped in gold.</em>
                </h1>
                <div class="stamp rv on">Opening Party · 11 July</div>
                <p class="rv on">Coffee by day. Cocktails by night. Milkshakes, smoothies, sandwiches, wine and spirits
                    in
                    between. Small place, big bite, good manners and absolutely no limp little corners.</p>
                <div class="hero-ctas rv on"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>Book for Opening
                        Party</a><a class="btn-gr" href="{{ route('coffee') }}" wire:navigate>View Coffee & Iced Drinks</a><a
                        class="btn-ghost" href="{{ route('cocktails') }}" wire:navigate>Explore Cocktails</a></div>
            </div>
        </section>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-gold">
            <div class="wrap poster rv">
                <div class="poster-art" style="background-image: url('{{ asset('/images/jazz-night-3.jpeg') }}')">
                    <div class="poster-title">Opening <em>Party</em></div>
                </div>
                <div class="poster-info">
                    <span class="s-lbl">11 July</span>
                    <h2 class="s-h2">All-day launch. <em>Evening live band.</em></h2>
                    <p>The badger wakes properly: coffee, kitchen, colourful drinks, cocktails and an evening live band.
                        A
                        little wild, a little polished, all HoneyBadger.</p>
                    <ul class="offer">
                        <li><strong>Daytime</strong>Coffee, iced drinks, smoothies, milkshakes, sandwiches and golden
                            launch
                            energy.</li>
                        <li><strong>Evening</strong>Cocktails, live band and tables worth reserving.</li>
                        <li><strong>House note</strong>Good manners encouraged. Boring corners not invited.</li>
                    </ul>
                    <div class="page-actions"><a class="btn-g" href="{{ route('opening_party') }}" wire:navigate>Book for Opening Party</a><a
                            class="btn-ghost" href="{{ route('events') }}" wire:navigate>View Events</a></div>
                </div>
            </div>
        </section>


        <section class="section dark textured-geo">
            <div class="wrap">
                <div class="deals-board rv">
                    <div class="deals-poster">
                        <img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                        <div class="deals-stamp">Badger Hours</div>
                        <h2>Happy Hours <em>with teeth.</em></h2>
                        <p>Rotating coffee, cocktail, wine, spirit and food deals for the hours when Norwich needs a
                            little
                            bite.</p>
                    </div>
                    <div class="deals-list">
                        <article class="deal-card">
                            <div class="deal-time">Rotating offers</div>
                            <h2 class="deal-title">Coffee Claws · Cocktail Bite · Snack Attack</h2>
                            <p class="deal-copy">The offers will move with the day: daytime coffee, afternoon snacks,
                                after-work cocktails and evening pours.</p>
                        </article>
                        <article class="deal-card">
                            <div class="deal-time">Ask at the bar</div>
                            <h2 class="deal-title">Today’s Bite</h2>
                            <p class="deal-copy">Deals may change by day, hour and mood. Come in, check the board, and
                                let
                                the badger show its teeth.</p>
                        </article>
                        <div class="page-actions"><a class="btn-g" href="{{ route('happy_hour') }}" wire:navigate>View Badger Hours</a><a
                                class="btn-ghost" href="{{ route('visit') }}#reserve" wire:navigate>Reserve</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section cream textured-honey">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">The Day Flow</span>
                    <h2 class="s-h2">Morning bite. <em>Afternoon swagger.</em></h2>
                    <p class="lead">The room changes with the hour: bright in the morning, hungry by afternoon,
                        sharper
                        after dark.</p>
                </div>
                <div class="rhythm rv">
                    <div class="rhythm-step">
                        <div class="rhythm-no">01</div>
                        <h3>Morning</h3>
                        <p>Coffee in the claws, iced drinks on the counter, smoothies for the bright-eyed and
                            breakfast-time
                            wanderers.</p>
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
            </div>
        </section>

        <section class="section dark textured-grunge" id="menu">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">Menu Highlights</span>
                    <h2 class="s-h2">Pick your poison. <em>Then follow the scent.</em></h2>
                    <p class="lead">Coffee, shakes, smoothies, food and cocktails each get their own little den. Easy
                        to
                        explore, dangerous to leave hungry.</p>
                </div>
                <div class="grid-3">
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.90)), url('{{ asset('/images/coffee.jpeg') }}');background-size:cover;background-position:center">
                        <div>
                            <div class="kicker">Daytime</div>
                            <h2>Colourful Coffee & Iced Drinks</h2>
                            <p>Hot coffee, iced lattes, syrups, milk options and refreshing coffee coolers.</p>
                        </div><a class="card-link" href="{{ route('coffee') }}" wire:navigate>View Coffee & Iced Drinks</a>
                    </article>
                    <article class="card texture-honey rv">
                        <div>
                            <div class="kicker">Sweet & Fresh</div>
                            <h2>Milkshakes & Smoothies</h2>
                            <p>Thick shakes, fruit blends and bright drinks for sunny afternoons and easy catch-ups.</p>
                        </div><a class="card-link" href="{{ route('coffee') }}" wire:navigate>See Milkshakes & Smoothies</a>
                    </article>
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.88)), url('{{ asset('/images/featured-cocktails.jpeg') }}');background-size:cover;background-position:center">
                        <div>
                            <div class="kicker">Evening</div>
                            <h2>Cocktails</h2>
                            <p>Signature serves, classics and an evening atmosphere with a little gold dust in the
                                glass.
                            </p>
                        </div><a class="card-link" href="{{ route('cocktails') }}" wire:navigate>Explore Cocktails</a>
                    </article>
                    <article class="card texture-grunge rv">
                        <div>
                            <div class="kicker">Kitchen</div>
                            <h2>Sandwiches & Food</h2>
                            <p>Fresh sandwiches, light bites and opening-party kitchen favourites.</p>
                        </div><a class="card-link" href="{{ route('food') }}" wire:navigate>View Food</a>
                    </article>
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.66),rgba(13,12,8,.88)), url('{{ asset('/images/aslan-martinis.jpeg') }}');background-size:cover;background-position:center"><img class="watermark"
                            src="{{ asset('/images/honeybadger-mark.png') }}" alt="">
                        <div>
                            <div class="kicker">Bar</div>
                            <h2>Wine & Spirits</h2>
                            <p>Wine by the glass or bottle, spirits for the evening and a grown-up finish.</p>
                        </div><a class="card-link" href="{{ route('cocktails') }}" wire:navigate>View Wine & Spirits</a>
                    </article>
                    <article class="card rv" style="background-image:linear-gradient(rgba(13,12,8,.70),rgba(13,12,8,.90)), url('{{ asset('/images/aslan-mural-portrait.jpeg') }}');background-size:cover;background-position:center"><img class="watermark"
                            src="{{ asset('/images/honeybadger-mark.png') }}" alt="">
                        <div>
                            <div class="kicker">Story</div>
                            <h2>Wounds Worn With Honour</h2>
                            <p>Scars, cobra bites, gold dust and Red Lion Street stubbornness: the full HoneyBadger
                                chronicle.</p>
                        </div><a class="card-link" href="{{ route('story') }}" wire:navigate>Read the Chronicle</a>
                    </article>
                </div>
            </div>
        </section>

        <section class="section white textured-emerald">
            <div class="wrap">
                <div class="s-head rv"><span class="s-lbl">House Lines</span>
                    <h2 class="s-h2">Small place. <em>Big bite.</em></h2>
                    <p class="lead">Warm welcome, sharp drinks, good manners and a room with teeth.</p>
                </div>
                <div class="quote-strip rv">
                    <div class="quote-card"><strong>Vicious little bastard. Beautiful little bar.</strong><span>House
                            nature</span></div>
                    <div class="quote-card"><strong>Coffee in the claws. Cocktails after dark.</strong><span>All-day
                            bite</span></div>
                    <div class="quote-card"><strong>Good manners at the door. Sharp teeth behind the
                            bar.</strong><span>House rule</span></div>
                </div>
            </div>
        </section>

        <section class="section dark textured-geo">
            <div class="wrap two">
                <div class="panel texture-gold rv"><span class="s-lbl">Events</span>
                    <h2 class="s-h2">Opening party first. <em>More nights after.</em></h2>
                    <p>HoneyBadger is built for daytime visits, evening drinks and nights with a proper pulse.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('events') }}" wire:navigate>View Events</a></div>
                </div>
                <div class="panel texture-emerald rv"><span class="s-lbl">Visit</span>
                    <h2 class="s-h2">Find us on <em>Red Lion Street.</em></h2>
                    <p>Reserve for the opening party, ask about events, or plan a daytime visit.</p>
                    <div class="page-actions"><a class="btn-gr" href="{{ route('visit') }}#reserve" wire:navigate>Reserve a Table</a></div>
                </div>
            </div>
        </section>

    </x-slot>

</x-layouts.structure>
