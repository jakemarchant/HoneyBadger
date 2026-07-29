<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">Our story</div>
                    <h1 class="page-title">Wounds worn <em>with honour.</em></h1>
                    <p class="page-intro">Every independent place that survives gathers a few scars. Ours are not hidden.
                        They are polished, framed, and kept behind the bar with the good bottles.</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>Visit HoneyBadger</a><a
                            class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>Opening Party</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-grunge">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">Six Traits · One Philosophy</span>
                    <h2 class="s-h2">The anatomy of a <em>HoneyBadger.</em></h2>
                    <p>HoneyBadger is not just a name on the door. It is a way of standing your ground, making good
                        coffee, serving proper food, pouring sharp drinks, and refusing to become beige.</p>
                </div>

                <div class="traits-grid rv">
                    <article class="trait">
                        <div class="trait-no">01</div>
                        <h3 class="trait-title">The Thick Skin</h3>
                        <div class="trait-sub">We have heard it all before</div>
                        <p class="trait-body">Honey badger skin is famously tough. When something grabs it, it turns
                            around inside its own hide and bites back. Independent hospitality asks for the same gift:
                            softness for guests, armour for storms.</p>
                    </article>
                    <article class="trait">
                        <div class="trait-no">02</div>
                        <h3 class="trait-title">Doesn't Care</h3>
                        <div class="trait-sub">Trend-proof by nature</div>
                        <p class="trait-body">The honey badger has never asked permission to be itself. It eats what it
                            wants, sleeps where it wants, and gets on with the day. Same energy here: coffee, food,
                            cocktails, music and no nervous little apologies.</p>
                    </article>
                    <article class="trait">
                        <div class="trait-no">03</div>
                        <h3 class="trait-title">Eats Snakes</h3>
                        <div class="trait-sub">Takes on the big ones</div>
                        <p class="trait-body">Black mambas. King cobras. Puff adders. It gets bitten, collapses briefly,
                            then gets back up and finishes the meal. We admire this approach to adversity enormously.
                        </p>
                    </article>
                    <article class="trait">
                        <div class="trait-no">04</div>
                        <h3 class="trait-title">The Honey Guide</h3>
                        <div class="trait-sub">Instinct finds the good stuff</div>
                        <p class="trait-body">The real honey badger follows the bird to the hive. Instinct, trust and
                            hunger lead to the golden thing. We follow the same trail: good guests, good suppliers, good
                            flavours, good nights.</p>
                    </article>
                    <article class="trait">
                        <div class="trait-no">05</div>
                        <h3 class="trait-title">Escape Artist</h3>
                        <div class="trait-sub">Cannot be put in a box</div>
                        <p class="trait-body">Captive honey badgers have used rocks, branches and pure refusal to escape
                            enclosures. We are not a chain, not a category, not a sleepy template. We are leaving
                            through the roof if necessary.</p>
                    </article>
                    <article class="trait">
                        <div class="trait-no">06</div>
                        <h3 class="trait-title">The Musk</h3>
                        <div class="trait-sub">The scent is unmistakable</div>
                        <p class="trait-body">The honey badger has a scent that announces itself. Ours smells better:
                            roasting coffee, warm bread, honeyed gold, something fresh from the kitchen and something
                            dangerous from the bar.</p>
                    </article>
                </div>

                <div class="pull-quote rv">
                    <p>"The honey badger takes a cobra bite, collapses theatrically, <span>gets back up</span>, and
                        finishes its meal."</p>
                    <small>On resilience, stubbornness and excellent coffee</small>
                </div>
            </div>
        </section>

        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">The Scar Collection</span>
                    <h2 class="s-h2">Wounds <em>worn</em> with honour.</h2>
                    <p>Every independent place that survives gathers a collection of battle scars. We wear ours like
                        medals, then open the doors again in the morning.</p>
                </div>

                <div class="medals rv">
                    <article class="medal">
                        <div class="medal-disc">🐍</div>
                        <h3 class="medal-title">Cobra Bitten<br>Still Standing</h3>
                        <div class="medal-sub">Awarded: multiple times</div>
                    </article>
                    <article class="medal">
                        <div class="medal-disc">⚡</div>
                        <h3 class="medal-title">Took the Storm<br>Didn't Go Down</h3>
                        <div class="medal-sub">First class, with stubbornness</div>
                    </article>
                    <article class="medal">
                        <div class="medal-disc">🗺️</div>
                        <h3 class="medal-title">Territory<br>Secured — NR1</h3>
                        <div class="medal-sub">Ground floor, Red Lion Street</div>
                    </article>
                    <article class="medal">
                        <div class="medal-disc">🦁</div>
                        <h3 class="medal-title">The Lion<br>Upstairs</h3>
                        <div class="medal-sub">Two moods, one building</div>
                    </article>
                    <article class="medal">
                        <div class="medal-disc">☕</div>
                        <h3 class="medal-title">Kept Making<br>Good Coffee</h3>
                        <div class="medal-sub">Throughout all of the above</div>
                    </article>
                    <article class="medal">
                        <div class="medal-disc">🎨</div>
                        <h3 class="medal-title">Klimt Still<br>On the Walls</h3>
                        <div class="medal-sub">Unmoved. Unbothered.</div>
                    </article>
                </div>

                <div class="pull-quote rv">
                    <p>"Every scar is a story. Every story ends the same way: we opened in the morning, made good food,
                        poured honest coffee, and were still here when everyone said we wouldn't be."</p>
                    <small>HoneyBadger Norwich · Ground Floor · Still Here</small>
                </div>
            </div>
        </section>

        <section class="section dark textured-emerald">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">The Chronicle</span>
                    <h2 class="s-h2">How we got <em>here.</em></h2>
                    <p>An honest account, told in honey badger terms, which is the only way it makes any sense.</p>
                </div>

                <div class="timeline rv">
                    <article class="timeline-item">
                        <div class="timeline-date">The Beginning</div>
                        <div class="timeline-copy">
                            <h3>We found the burrow on Red Lion Street</h3>
                            <p>One ground floor. One vision. Mediterranean warmth, honest coffee, Klimt on the walls and
                                a name that said everything about our attitude. Norwich did not know what was coming.
                            </p>
                        </div>
                    </article>
                    <article class="timeline-item">
                        <div class="timeline-date">The Biting Season</div>
                        <div class="timeline-copy">
                            <h3>Then came the attacks</h3>
                            <p>Every independent place has a biting season. Ours arrived wearing several faces and came
                                from several angles at once, which is, if nothing else, very efficient.</p>
                        </div>
                    </article>
                    <article class="timeline-item">
                        <div class="timeline-date">The Limp</div>
                        <div class="timeline-copy">
                            <h3>We briefly went limp. It was fine.</h3>
                            <p>This is a documented honey badger thing. After a cobra strike, the honey badger collapses
                                for a few minutes. Looks dead. Is not dead. It has gone somewhere quiet to process the
                                venom and formulate a response.</p>
                        </div>
                    </article>
                    <article class="timeline-item">
                        <div class="timeline-date">The Rising</div>
                        <div class="timeline-copy">
                            <h3>We got back up and finished the meal</h3>
                            <p>The honey badger always gets back up. That part is not optional. We opened the doors,
                                made the coffee, put the music on and were still here when everyone expected otherwise.
                            </p>
                        </div>
                    </article>
                    <article class="timeline-item">
                        <div class="timeline-date">The Lion Arrives</div>
                        <div class="timeline-copy">
                            <h3>The Aslan took the first floor</h3>
                            <p>The Aslan Lounge brought a second mood to the building: quieter, curated, more reserved.
                                The lion upstairs, the badger downstairs. Different worlds, same address.</p>
                        </div>
                    </article>
                    <article class="timeline-item">
                        <div class="timeline-date">The Present</div>
                        <div class="timeline-copy">
                            <h3>Ground floor. Doors open. Always.</h3>
                            <p>The honey badger guards the ground floor, welcomes the community, makes excellent coffee
                                and occasionally dangerous cocktails. The Klimt murals remain unmoved. So do we.</p>
                        </div>
                    </article>
                </div>

                <div class="photo-strip rv">
                    <figure><img src="{{ asset('/images/the-aslan-lounge.jpeg') }}" alt="The Aslan Lounge seating area"></figure>
                    <figure><img src="{{ asset('/images/the-aslan-lounge-2.jpeg') }}" alt="Mirror and mural inside the Aslan Lounge"></figure>
                    <figure><img src="{{ asset('/images/the-aslan-lounge-3.jpeg') }}" alt="Wine and mural artwork in the Aslan Lounge"></figure>
                    <figure><img src="{{ asset('/images/the-aslan-lounge-4.jpeg') }}" alt="Cosy booth seating in the Aslan Lounge"></figure>
                    <figure><img src="{{ asset('/images/aslan-mural-portrait.jpeg') }}" alt="Close-up of the Klimt-style mural"></figure>
                    <figure><img src="{{ asset('/images/cheers.jpeg') }}" alt="A toast in front of the HoneyBadger mural"></figure>
                </div>
                <div class="story-two-worlds rv">
                    <article class="world-card">
                        <h3>The Badger</h3>
                        <p>Ground-floor energy. Coffee, kitchen, colourful drinks, sandwiches, smoothies, cocktails and
                            the kind of room that refuses to be dull.</p>
                    </article>
                    <article class="world-card">
                        <h3>The Lion</h3>
                        <p>The Aslan Lounge upstairs: quieter, more curated, more private. A different pace above the
                            same heartbeat.</p>
                    </article>
                </div>

                <div class="cta rv">
                    <h2>Still here. Still pouring.</h2>
                    <p>The story is not polished flat. It has scratches, gold dust, teeth marks and a door that keeps
                        opening.</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>Visit HoneyBadger</a><a
                            class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>Opening Party</a></div>
                </div>

                <div class="links"><a href="{{ route('home') }}" wire:navigate>Home</a><a href="{{ route('coffee') }}" wire:navigate>Coffee</a><a
                        href="{{ route('cocktails') }}" wire:navigate>Cocktails</a><a href="{{ route('events') }}" wire:navigate>Events</a><a
                        href="{{ route('visit') }}" wire:navigate>Visit</a></div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
