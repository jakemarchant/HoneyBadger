<x-layouts.structure>

    <x-slot name="title">{{ page_field('story', 'page_title', 'Our Story | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('story', 'meta_description', 'The story of HoneyBadger Norwich: an independent café-bar on Red Lion Street built on thick skin, good coffee and sharp cocktails, with The Aslan Lounge upstairs.') }}</x-slot>
    <x-slot name="image">{{ page_image('story', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">{{ page_field('story', 'hero_eyebrow', 'Our story') }}</div>
                    <x-editable-heading page="story" field="hero_heading" tag="h1" class="page-title">Wounds worn <em>with honour.</em></x-editable-heading>
                    <p class="page-intro">{{ page_field('story', 'hero_intro', 'Every independent place that survives gathers a few scars. Ours are not hidden. They are polished, framed, and kept behind the bar with the good bottles.') }}</p>
                    <div class="page-actions"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>{{ page_field('story', 'hero_cta_1', 'Visit HoneyBadger') }}</a><a
                            class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('story', 'hero_cta_2', 'Opening Party') }}</a></div>
                </div>
                <div class="logo-panel rv on"><img src="{{ page_image('story', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo"></div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>

        <section class="section dark textured-grunge">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">{{ page_field('story', 'section1_label', 'Six Traits · One Philosophy') }}</span>
                    <x-editable-heading page="story" field="section1_heading" tag="h2" class="s-h2">The anatomy of a <em>HoneyBadger.</em></x-editable-heading>
                    <p>{{ page_field('story', 'section1_intro', 'HoneyBadger is not just a name on the door. It is a way of standing your ground, making good coffee, serving proper food, pouring sharp drinks, and refusing to become beige.') }}</p>
                </div>

                <div class="traits-grid rv">
                    @foreach (page_field('story', 'traits', [
                        ['title' => 'The Thick Skin', 'subtitle' => 'We have heard it all before', 'body' => 'Honey badger skin is famously tough. When something grabs it, it turns around inside its own hide and bites back. Independent hospitality asks for the same gift: softness for guests, armour for storms.'],
                        ['title' => "Doesn't Care", 'subtitle' => 'Trend-proof by nature', 'body' => 'The honey badger has never asked permission to be itself. It eats what it wants, sleeps where it wants, and gets on with the day. Same energy here: coffee, food, cocktails, music and no nervous little apologies.'],
                        ['title' => 'Eats Snakes', 'subtitle' => 'Takes on the big ones', 'body' => 'Black mambas. King cobras. Puff adders. It gets bitten, collapses briefly, then gets back up and finishes the meal. We admire this approach to adversity enormously.'],
                        ['title' => 'The Honey Guide', 'subtitle' => 'Instinct finds the good stuff', 'body' => 'The real honey badger follows the bird to the hive. Instinct, trust and hunger lead to the golden thing. We follow the same trail: good guests, good suppliers, good flavours, good nights.'],
                        ['title' => 'Escape Artist', 'subtitle' => 'Cannot be put in a box', 'body' => 'Captive honey badgers have used rocks, branches and pure refusal to escape enclosures. We are not a chain, not a category, not a sleepy template. We are leaving through the roof if necessary.'],
                        ['title' => 'The Musk', 'subtitle' => 'The scent is unmistakable', 'body' => 'The honey badger has a scent that announces itself. Ours smells better: roasting coffee, warm bread, honeyed gold, something fresh from the kitchen and something dangerous from the bar.'],
                    ]) as $trait)
                        <article class="trait">
                            <div class="trait-no">{{ sprintf('%02d', $loop->iteration) }}</div>
                            <h3 class="trait-title">{{ $trait['title'] }}</h3>
                            <div class="trait-sub">{{ $trait['subtitle'] }}</div>
                            <p class="trait-body">{{ $trait['body'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div class="pull-quote rv">
                    <x-editable-heading page="story" field="quote1_text" tag="p">"The honey badger takes a cobra bite, collapses theatrically, <span>gets back up</span>, and
                        finishes its meal."</x-editable-heading>
                    <small>{{ page_field('story', 'quote1_attribution', 'On resilience, stubbornness and excellent coffee') }}</small>
                </div>
            </div>
        </section>

        <section class="section dark textured-gold">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">{{ page_field('story', 'section2_label', 'The Scar Collection') }}</span>
                    <x-editable-heading page="story" field="section2_heading" tag="h2" class="s-h2">Wounds <em>worn</em> with honour.</x-editable-heading>
                    <p>{{ page_field('story', 'section2_intro', 'Every independent place that survives gathers a collection of battle scars. We wear ours like medals, then open the doors again in the morning.') }}</p>
                </div>

                <div class="medals rv">
                    @foreach (page_field('story', 'medals', [
                        ['icon' => '🐍', 'title' => 'Cobra Bitten', 'title_line2' => 'Still Standing', 'subtitle' => 'Awarded: multiple times'],
                        ['icon' => '⚡', 'title' => 'Took the Storm', 'title_line2' => "Didn't Go Down", 'subtitle' => 'First class, with stubbornness'],
                        ['icon' => '🗺️', 'title' => 'Territory', 'title_line2' => 'Secured — NR1', 'subtitle' => 'Ground floor, Red Lion Street'],
                        ['icon' => '🦁', 'title' => 'The Lion', 'title_line2' => 'Upstairs', 'subtitle' => 'Two moods, one building'],
                        ['icon' => '☕', 'title' => 'Kept Making', 'title_line2' => 'Good Coffee', 'subtitle' => 'Throughout all of the above'],
                        ['icon' => '🎨', 'title' => 'Klimt Still', 'title_line2' => 'On the Walls', 'subtitle' => 'Unmoved. Unbothered.'],
                    ]) as $medal)
                        <article class="medal">
                            <div class="medal-disc">{{ $medal['icon'] }}</div>
                            <h3 class="medal-title">{{ $medal['title'] }}<br>{{ $medal['title_line2'] }}</h3>
                            <div class="medal-sub">{{ $medal['subtitle'] }}</div>
                        </article>
                    @endforeach
                </div>

                <div class="pull-quote rv">
                    <p>{{ page_field('story', 'quote2_text', '"Every scar is a story. Every story ends the same way: we opened in the morning, made good food, poured honest coffee, and were still here when everyone said we wouldn\'t be."') }}</p>
                    <small>{{ page_field('story', 'quote2_attribution', 'HoneyBadger Norwich · Ground Floor · Still Here') }}</small>
                </div>
            </div>
        </section>

        <section class="section dark textured-emerald">
            <div class="wrap">
                <div class="story-intro rv">
                    <span class="s-lbl">{{ page_field('story', 'section3_label', 'The Chronicle') }}</span>
                    <x-editable-heading page="story" field="section3_heading" tag="h2" class="s-h2">How we got <em>here.</em></x-editable-heading>
                    <p>{{ page_field('story', 'section3_intro', 'An honest account, told in honey badger terms, which is the only way it makes any sense.') }}</p>
                </div>

                <div class="timeline rv">
                    @foreach (page_field('story', 'timeline', [
                        ['date_label' => 'The Beginning', 'title' => 'We found the burrow on Red Lion Street', 'body' => 'One ground floor. One vision. Mediterranean warmth, honest coffee, Klimt on the walls and a name that said everything about our attitude. Norwich did not know what was coming.'],
                        ['date_label' => 'The Biting Season', 'title' => 'Then came the attacks', 'body' => 'Every independent place has a biting season. Ours arrived wearing several faces and came from several angles at once, which is, if nothing else, very efficient.'],
                        ['date_label' => 'The Limp', 'title' => 'We briefly went limp. It was fine.', 'body' => 'This is a documented honey badger thing. After a cobra strike, the honey badger collapses for a few minutes. Looks dead. Is not dead. It has gone somewhere quiet to process the venom and formulate a response.'],
                        ['date_label' => 'The Rising', 'title' => 'We got back up and finished the meal', 'body' => 'The honey badger always gets back up. That part is not optional. We opened the doors, made the coffee, put the music on and were still here when everyone expected otherwise.'],
                        ['date_label' => 'The Lion Arrives', 'title' => 'The Aslan took the first floor', 'body' => 'The Aslan Lounge brought a second mood to the building: quieter, curated, more reserved. The lion upstairs, the badger downstairs. Different worlds, same address.'],
                        ['date_label' => 'The Present', 'title' => 'Ground floor. Doors open. Always.', 'body' => 'The honey badger guards the ground floor, welcomes the community, makes excellent coffee and occasionally dangerous cocktails. The Klimt murals remain unmoved. So do we.'],
                    ]) as $item)
                        <article class="timeline-item">
                            <div class="timeline-date">{{ $item['date_label'] }}</div>
                            <div class="timeline-copy">
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['body'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="photo-strip rv">
                    @foreach (page_field('story', 'photos', [
                        ['image' => 'the-aslan-lounge.jpeg', 'alt' => 'The Aslan Lounge seating area'],
                        ['image' => 'the-aslan-lounge-2.jpeg', 'alt' => 'Mirror and mural inside the Aslan Lounge'],
                        ['image' => 'the-aslan-lounge-3.jpeg', 'alt' => 'Wine and mural artwork in the Aslan Lounge'],
                        ['image' => 'the-aslan-lounge-4.jpeg', 'alt' => 'Cosy booth seating in the Aslan Lounge'],
                        ['image' => 'aslan-mural-portrait.jpeg', 'alt' => 'Close-up of the Klimt-style mural'],
                        ['image' => 'cheers.jpeg', 'alt' => 'A toast in front of the HoneyBadger mural'],
                    ]) as $photo)
                        <figure><img src="{{ resolve_page_image($photo['image'], $photo['image']) }}" alt="{{ $photo['alt'] }}"></figure>
                    @endforeach
                </div>
                <div class="story-two-worlds rv">
                    @foreach (page_field('story', 'worlds', [
                        ['title' => 'The Badger', 'body' => 'Ground-floor energy. Coffee, kitchen, colourful drinks, sandwiches, smoothies, cocktails and the kind of room that refuses to be dull.'],
                        ['title' => 'The Lion', 'body' => 'The Aslan Lounge upstairs: quieter, more curated, more private. A different pace above the same heartbeat.'],
                    ]) as $world)
                        <article class="world-card">
                            <h3>{{ $world['title'] }}</h3>
                            <p>{{ $world['body'] }}</p>
                        </article>
                    @endforeach
                </div>

                <div class="cta rv">
                    <h2>{{ page_field('story', 'cta_heading', 'Still here. Still pouring.') }}</h2>
                    <p>{{ page_field('story', 'cta_body', 'The story is not polished flat. It has scratches, gold dust, teeth marks and a door that keeps opening.') }}</p>
                    <div class="hero-ctas"><a class="btn-g" href="{{ route('visit') }}" wire:navigate>{{ page_field('story', 'cta_1', 'Visit HoneyBadger') }}</a><a
                            class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>{{ page_field('story', 'cta_2', 'Opening Party') }}</a></div>
                </div>

                <div class="links"><a href="{{ route('home') }}" wire:navigate>Home</a><a href="{{ route('coffee') }}" wire:navigate>Coffee</a><a
                        href="{{ route('cocktails') }}" wire:navigate>Cocktails</a><a href="{{ route('events') }}" wire:navigate>Events</a><a
                        href="{{ route('visit') }}" wire:navigate>Visit</a></div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
