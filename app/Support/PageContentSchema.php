<?php

namespace App\Support;

class PageContentSchema
{
    /**
     * Ordered, admin-form-driving field definitions for a page, including a
     * 'default' value matching what's hardcoded inline in that page's Blade
     * template. This file is NOT the source of truth for what the public
     * site renders (each Blade template still carries its own literal
     * default in its page_field()/page_image() call, or <x-editable-heading>
     * slot) — the two are kept in sync by hand since page structure is
     * fixed. The 'default' here only seeds the admin edit form before
     * anything has been customized.
     */
    public static function forPage(string $slug): array
    {
        return match ($slug) {
            'welcome' => self::welcome(),
            'cocktails' => self::cocktails(),
            'food' => self::food(),
            'coffee' => self::coffee(),
            'events' => self::events(),
            'happy_hour' => self::happyHour(),
            'opening_party' => self::openingParty(),
            'story' => self::story(),
            'visit' => self::visit(),
            default => [],
        };
    }

    private static function text(string $key, string $label, string $default = ''): array
    {
        return ['key' => $key, 'label' => $label, 'type' => 'text', 'default' => $default];
    }

    private static function textarea(string $key, string $label, string $default = ''): array
    {
        return ['key' => $key, 'label' => $label, 'type' => 'textarea', 'default' => $default];
    }

    private static function image(string $key, string $label, string $default = ''): array
    {
        return ['key' => $key, 'label' => $label, 'type' => 'image', 'default' => $default];
    }

    private static function list(string $key, string $label, array $items, array $default = []): array
    {
        return ['key' => $key, 'label' => $label, 'type' => 'list', 'items' => $items, 'default' => $default];
    }

    /** The image shown at the top of every page (defaults to the site logo). */
    private static function heroImage(): array
    {
        return self::image('hero_image', 'Top banner photo', 'honeybadger-logo.png');
    }

    /** The Google search-result snippet for this page. */
    private static function metaDescription(string $default): array
    {
        return self::textarea('meta_description', 'Search result description (shown in Google, ~150-160 characters)', $default);
    }

    /** Reusable list item shapes */
    private static function offerItems(): array
    {
        return [self::text('label', 'Title'), self::text('description', 'Description')];
    }

    private static function quoteItems(): array
    {
        return [self::text('quote', 'Quote'), self::text('attribution', 'Who said it')];
    }

    private static function photoItems(): array
    {
        return [self::image('image', 'Photo'), self::text('alt', 'Photo description (for accessibility)')];
    }

    private static function cardItems(): array
    {
        return [
            self::image('bg_image', 'Photo'),
            self::text('kicker', 'Small heading'),
            self::text('title', 'Title'),
            self::textarea('body', 'Text'),
            self::text('link_text', 'Button text'),
            self::text('link_url', 'Where the button goes'),
        ];
    }

    private static function welcome(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'HoneyBadger Norwich | Café · Kitchen · Cocktails'),
            self::metaDescription('HoneyBadger Norwich is a vibrant café, kitchen and cocktail bar on Red Lion Street, Norwich — coffee by day, cocktails by night, with food, milkshakes and an opening party on 11 July.'),
            self::text('hero_eyebrow', 'Top banner small heading', '1 Red Lion Street · Norwich'),
            self::heroImage(),
            self::text('hero_line1', 'Top banner main heading (line 1)', 'A vicious little bastard of a café-bar.'),
            self::text('hero_line2_em', 'Top banner main heading (line 2, highlighted)', 'Dressed in emerald.'),
            self::text('hero_line3_em', 'Top banner main heading (line 3, highlighted)', 'Dipped in gold.'),
            self::text('hero_stamp', 'Top banner badge text', 'Opening Party · 11 July'),
            self::textarea('hero_intro', 'Top banner text', 'Coffee by day. Cocktails by night. Milkshakes, smoothies, sandwiches, wine and spirits in between. Small place, big bite, good manners and absolutely no limp little corners.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Book for Opening Party'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'View Coffee & Iced Drinks'),
            self::text('hero_cta_3', 'Top banner button 3 text', 'Explore Cocktails'),
            self::image('poster_bg_image', 'Opening Party poster photo', 'jazz-night-3.jpeg'),
            self::text('poster_title', 'Poster title (on the photo)', 'Opening Party'),
            self::text('poster_label', 'Poster small heading', '11 July'),
            self::text('poster_heading', 'Poster main heading', 'All-day launch. Evening live band.'),
            self::textarea('poster_body', 'Poster text', 'The badger wakes properly: coffee, kitchen, colourful drinks, cocktails and an evening live band. A little wild, a little polished, all HoneyBadger.'),
            self::list('poster_offers', 'Poster list', self::offerItems(), [
                ['label' => 'Daytime', 'description' => 'Coffee, iced drinks, smoothies, milkshakes, sandwiches and golden launch energy.'],
                ['label' => 'Evening', 'description' => 'Cocktails, live band and tables worth reserving.'],
                ['label' => 'House note', 'description' => 'Good manners encouraged. Boring corners not invited.'],
            ]),
            self::text('poster_cta_1', 'Poster button 1 text', 'Book for Opening Party'),
            self::text('poster_cta_2', 'Poster button 2 text', 'View Events'),
            self::image('deals_bg_image', 'Deals poster photo', 'smile-with-teeth.jpg'),
            self::text('deals_stamp', 'Deals badge text', 'Badger Hours'),
            self::text('deals_heading', 'Deals main heading', 'Happy Hours with teeth.'),
            self::textarea('deals_body', 'Deals text', 'Rotating coffee, cocktail, wine, spirit and food deals for the hours when Norwich needs a little bite.'),
            self::list('deals_cards', 'Deals list', [self::text('time', 'Time'), self::text('title', 'Title'), self::textarea('copy', 'Text')], [
                ['time' => 'Rotating offers', 'title' => 'Coffee Claws · Cocktail Bite · Snack Attack', 'copy' => 'The offers will move with the day: daytime coffee, afternoon snacks, after-work cocktails and evening pours.'],
                ['time' => 'Ask at the bar', 'title' => 'Today’s Bite', 'copy' => 'Deals may change by day, hour and mood. Come in, check the board, and let the badger show its teeth.'],
            ]),
            self::text('deals_cta_1', 'Deals button 1 text', 'View Badger Hours'),
            self::text('deals_cta_2', 'Deals button 2 text', 'Reserve'),
            self::text('dayflow_label', '"Day Flow" section small heading', 'The Day Flow'),
            self::text('dayflow_heading', '"Day Flow" section main heading', 'Morning bite. Afternoon swagger.'),
            self::textarea('dayflow_lead', '"Day Flow" section text', 'The room changes with the hour: bright in the morning, hungry by afternoon, sharper after dark.'),
            self::list('rhythm_steps', '"Day Flow" section steps', [self::text('title', 'Title'), self::textarea('body', 'Text'), self::image('bg_image', 'Photo')], [
                ['title' => 'Morning', 'body' => 'Coffee in the claws, iced drinks on the counter, smoothies for the bright-eyed and breakfast-time wanderers.', 'bg_image' => 'coffee.jpeg'],
                ['title' => 'Afternoon', 'body' => 'Sandwiches, shakes, light bites and that golden little hour when hunger starts barking.', 'bg_image' => 'sandwiches.jpg'],
                ['title' => 'Evening', 'body' => 'Cocktails, wine, spirits, music and the darker gold-lit side of the room.', 'bg_image' => 'cocktails.jpeg'],
            ]),
            self::text('menu_label', '"Menu Highlights" section small heading', 'Menu Highlights'),
            self::text('menu_heading', '"Menu Highlights" section main heading', 'Pick your poison. Then follow the scent.'),
            self::textarea('menu_lead', '"Menu Highlights" section text', 'Coffee, shakes, smoothies, food and cocktails each get their own little den. Easy to explore, dangerous to leave hungry.'),
            self::list('menu_cards', 'Menu highlight cards', self::cardItems(), [
                ['bg_image' => 'coffee.jpeg', 'kicker' => 'Daytime', 'title' => 'Colourful Coffee & Iced Drinks', 'body' => 'Hot coffee, iced lattes, syrups, milk options and refreshing coffee coolers.', 'link_text' => 'View Coffee & Iced Drinks', 'link_url' => '/coffee'],
                ['bg_image' => '', 'kicker' => 'Sweet & Fresh', 'title' => 'Milkshakes & Smoothies', 'body' => 'Thick shakes, fruit blends and bright drinks for sunny afternoons and easy catch-ups.', 'link_text' => 'See Milkshakes & Smoothies', 'link_url' => '/coffee'],
                ['bg_image' => 'featured-cocktails.jpeg', 'kicker' => 'Evening', 'title' => 'Cocktails', 'body' => 'Signature serves, classics and an evening atmosphere with a little gold dust in the glass.', 'link_text' => 'Explore Cocktails', 'link_url' => '/cocktails'],
                ['bg_image' => '', 'kicker' => 'Kitchen', 'title' => 'Sandwiches & Food', 'body' => 'Fresh sandwiches, light bites and opening-party kitchen favourites.', 'link_text' => 'View Food', 'link_url' => '/food'],
                ['bg_image' => 'aslan-martinis.jpeg', 'kicker' => 'Bar', 'title' => 'Wine & Spirits', 'body' => 'Wine by the glass or bottle, spirits for the evening and a grown-up finish.', 'link_text' => 'View Wine & Spirits', 'link_url' => '/cocktails'],
                ['bg_image' => 'aslan-mural-portrait.jpeg', 'kicker' => 'Story', 'title' => 'Wounds Worn With Honour', 'body' => 'Scars, cobra bites, gold dust and Red Lion Street stubbornness: the full HoneyBadger chronicle.', 'link_text' => 'Read the Chronicle', 'link_url' => '/story'],
            ]),
            self::text('house_label', '"House Lines" section small heading', 'House Lines'),
            self::text('house_heading', '"House Lines" section main heading', 'Small place. Big bite.'),
            self::textarea('house_lead', '"House Lines" section text', 'Warm welcome, sharp drinks, good manners and a room with teeth.'),
            self::list('house_quotes', '"House Lines" customer quotes', self::quoteItems(), [
                ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
            ]),
            self::text('events_panel_label', 'Events box small heading', 'Events'),
            self::text('events_panel_heading', 'Events box main heading', 'Opening party first. More nights after.'),
            self::textarea('events_panel_body', 'Events box text', 'HoneyBadger is built for daytime visits, evening drinks and nights with a proper pulse.'),
            self::text('events_panel_cta', 'Events box button text', 'View Events'),
            self::text('visit_panel_label', 'Visit box small heading', 'Visit'),
            self::text('visit_panel_heading', 'Visit box main heading', 'Find us on Red Lion Street.'),
            self::textarea('visit_panel_body', 'Visit box text', 'Reserve for the opening party, ask about events, or plan a daytime visit.'),
            self::text('visit_panel_cta', 'Visit box button text', 'Reserve a Table'),
        ];
    }

    private static function cocktails(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Cocktails | HoneyBadger Norwich'),
            self::metaDescription('Signature and classic cocktails at HoneyBadger Norwich, a bold café-bar on Red Lion Street, Norwich. Evening drinks, opening-party cocktails and seasonal specials.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Evening drinks'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Cocktails at HoneyBadger Norwich'),
            self::textarea('hero_intro', 'Top banner text', 'Gold dust, dark emerald, sharp serves and a bar that knows when to smile with teeth.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Reserve'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'View Events'),
            self::text('panel1_heading', 'Column 1 heading', 'Signature Cocktails'),
            self::textarea('panel1_body', 'Column 1 text', 'HoneyBadger cocktails are bold, colourful and social — drinks with names people remember and flavours that carry the evening.'),
            self::list('panel1_offers', 'Column 1 list', self::offerItems(), [
                ['label' => 'House signatures', 'description' => 'Bright, sharp and playful serves built around the HoneyBadger personality.'],
                ['label' => 'Opening-party cocktails', 'description' => 'Easy-to-love drinks for the launch night crowd.'],
                ['label' => 'Seasonal specials', 'description' => 'Fresh ideas that move with the weather, music and mood.'],
            ]),
            self::text('panel2_heading', 'Column 2 heading', 'Classic Cocktails'),
            self::textarea('panel2_body', 'Column 2 text', 'The classics remain clean and familiar, with a HoneyBadger edge: polished enough for guests who know what they like, lively enough for those trying something new.'),
            self::list('panel2_offers', 'Column 2 list', self::offerItems(), [
                ['label' => 'Refreshing', 'description' => 'Mojito, Daiquiri, Margarita and Spritz-style favourites.'],
                ['label' => 'After-dark', 'description' => 'Espresso Martini, Negroni, Old Fashioned and Whiskey Sour style serves.'],
                ['label' => 'For groups', 'description' => 'Easy evening drinks for opening parties, birthdays and casual celebrations.'],
            ]),
            self::list('photos', 'Photo gallery', self::photoItems(), [
                ['image' => 'cocktails.jpeg', 'alt' => 'Signature cocktails at HoneyBadger Norwich'],
                ['image' => 'cocktail-in-the-sun.jpeg', 'alt' => 'A HoneyBadger cocktail catching the evening sun'],
                ['image' => 'featured-cocktails.jpeg', 'alt' => 'Featured cocktail with an orange twist'],
                ['image' => 'new-york-sours-cocktails.jpeg', 'alt' => 'New York Sour cocktail'],
                ['image' => 'pink-cocktails.jpeg', 'alt' => 'Two pink cocktails at HoneyBadger Norwich'],
                ['image' => 'spicy-marg-cocktails.jpeg', 'alt' => 'Spicy margarita with a chilli garnish'],
            ]),
            self::list('quotes', 'Customer quotes', self::quoteItems(), [
                ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Opening Party cocktails'),
            self::textarea('cta_body', 'Bottom banner text', 'Join us on 11 July for colourful drinks, kitchen energy and an evening live band. Evening tables are best reserved.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Reserve for Opening Party'),
            self::text('cta_2', 'Bottom banner button 2 text', 'Back to Home'),
        ];
    }

    private static function food(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Food | HoneyBadger Norwich'),
            self::metaDescription('Fresh sandwiches, light bites and kitchen favourites at HoneyBadger Norwich — daytime food to go with coffee, iced drinks or evening cocktails on Red Lion Street, Norwich.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Kitchen & light bites'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Sandwiches & Food at HoneyBadger Norwich'),
            self::textarea('hero_intro', 'Top banner text', 'Fresh sandwiches, light bites and kitchen energy for daytime hunger, opening-party appetites and people who know a sad snack when they see one.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Reserve'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'Coffee & Drinks'),
            self::text('panel1_heading', 'Column 1 heading', 'Sandwiches'),
            self::textarea('panel1_body', 'Column 1 text', 'Simple, satisfying and made for daytime visitors who want something fresh without turning lunch into a ceremony.'),
            self::list('panel1_offers', 'Column 1 list', self::offerItems(), [
                ['label' => 'Fresh options', 'description' => 'Easy-to-enjoy sandwiches and café-style favourites.'],
                ['label' => 'With drinks', 'description' => 'Pair with coffee, iced drinks, smoothies or wine depending on the hour.'],
                ['label' => 'All-day mood', 'description' => 'Food that supports the café energy without slowing it down.'],
            ]),
            self::text('panel2_heading', 'Column 2 heading', 'Light Bites & Opening Party Food'),
            self::textarea('panel2_body', 'Column 2 text', 'The kitchen supports the HoneyBadger rhythm: casual daytime bites, social plates and opening-party favourites.'),
            self::list('panel2_offers', 'Column 2 list', self::offerItems(), [
                ['label' => 'Light bites', 'description' => 'Easy plates for sharing, snacking and settling in.'],
                ['label' => 'Party energy', 'description' => 'Food that works with cocktails, music and a lively crowd.'],
                ['label' => 'No sad snacks', 'description' => 'Food with flavour, charm and enough bite to keep the little bastard proud.'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Food for the opening'),
            self::textarea('cta_body', 'Bottom banner text', 'Join us on 11 July for an all-day opening event with coffee, kitchen favourites, colourful drinks and cocktails.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Book for Opening Party'),
            self::text('cta_2', 'Bottom banner button 2 text', 'View Drinks'),
        ];
    }

    private static function coffee(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Coffee & Iced Drinks | HoneyBadger Norwich'),
            self::metaDescription('Coffee, iced drinks, milkshakes and smoothies at HoneyBadger Norwich, Red Lion Street. Daytime drinks made for regulars, quick meetings and sunny afternoons.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Daytime drinks'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Coffee & Iced Drinks in Norwich'),
            self::textarea('hero_intro', 'Top banner text', 'Coffee in the claws, iced drinks on the counter and enough flavour to wake the street before the cocktails start growling.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Visit HoneyBadger'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'See Milkshakes'),
            self::text('panel1_heading', 'Column 1 heading', 'Hot Coffee'),
            self::textarea('panel1_body', 'Column 1 text', 'Start simple, go rich, or make it flavoured. HoneyBadger coffee is made for daytime regulars, quick meetings and slow little pauses before the day bares its teeth.'),
            self::list('panel1_offers', 'Column 1 list', self::offerItems(), [
                ['label' => 'Core coffees', 'description' => 'Espresso, Americano, flat white, cappuccino, latte and macchiato-style favourites.'],
                ['label' => 'Comfort drinks', 'description' => 'Hot chocolate, chai, dirty chai and other warm favourites.'],
                ['label' => 'Choice', 'description' => 'Decaf available where possible.'],
            ]),
            self::text('panel2_heading', 'Column 2 heading', 'Iced Coffee Drinks'),
            self::textarea('panel2_body', 'Column 2 text', 'Cold, smooth and colourful — made for sunny afternoons, takeaway walks and a bright little lift.'),
            self::list('panel2_offers', 'Column 2 list', self::offerItems(), [
                ['label' => 'Iced favourites', 'description' => 'Iced latte, iced mocha and iced caramel-style drinks.'],
                ['label' => 'Syrups', 'description' => 'Vanilla, roasted hazelnut, caramel, salted caramel, peppermint and cherry.'],
                ['label' => 'Milk options', 'description' => 'Semi-skimmed, skimmed, oat, soya and coconut milk options.'],
            ]),
            self::text('panel3_heading', 'Column 3 heading', 'Milkshakes & Smoothies'),
            self::textarea('panel3_body', 'Column 3 text', 'Thick shakes and bright fruit blends for sunny afternoons, quick refuels and easy catch-ups.'),
            self::list('panel3_offers', 'Column 3 list', self::offerItems(), [
                ['label' => 'Milkshakes', 'description' => 'Classic and flavoured shakes, thick enough to earn the spoon.'],
                ['label' => 'Smoothies', 'description' => 'Fresh fruit blends for a lighter, brighter lift.'],
                ['label' => 'Best time', 'description' => 'Afternoon favourites, perfect alongside a sandwich.'],
            ]),
            self::image('feature_photo', 'Feature photo', 'coffee.jpeg'),
            self::text('feature_photo_alt', 'Feature photo description (for accessibility)', 'Turkish coffee served at HoneyBadger Norwich'),
            self::list('rhythm_steps', 'Daily rhythm steps', [self::text('title', 'Title'), self::textarea('body', 'Text'), self::image('bg_image', 'Photo')], [
                ['title' => 'Morning', 'body' => 'Coffee in the claws, iced drinks on the counter, smoothies for the bright-eyed and breakfast-time wanderers.', 'bg_image' => 'coffee.jpeg'],
                ['title' => 'Afternoon', 'body' => 'Sandwiches, shakes, light bites and that golden little hour when hunger starts barking.', 'bg_image' => 'sandwiches.jpg'],
                ['title' => 'Evening', 'body' => 'Cocktails, wine, spirits, music and the darker gold-lit side of the room.', 'bg_image' => 'cocktails.jpeg'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Daytime HoneyBadger'),
            self::textarea('cta_body', 'Bottom banner text', 'Come in for coffee, iced drinks, sandwiches, smoothies and a lighter daytime mood before the evening cocktails take over.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Visit Us'),
            self::text('cta_2', 'Bottom banner button 2 text', 'View Food'),
        ];
    }

    private static function events(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Events | HoneyBadger Norwich'),
            self::metaDescription('Events at HoneyBadger Norwich: the opening party on 11 July, live music nights and social gatherings at our café-bar on Red Lion Street, Norwich.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Events'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Events at HoneyBadger Norwich'),
            self::textarea('hero_intro', 'Top banner text', 'Opening party first, then more daytime and evening events with coffee, food, cocktails, music and good company.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Opening Party'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'Enquire'),
            self::list('event_cards', 'Event cards', self::cardItems(), [
                ['bg_image' => 'jazz-night.jpeg', 'kicker' => 'Upcoming', 'title' => 'HoneyBadger Opening Party', 'body' => '11 July. All-day launch with coffee, kitchen, colourful drinks, cocktails and an evening live band.', 'link_text' => 'Book for Opening Party', 'link_url' => '/opening-party'],
                ['bg_image' => 'jazz-night-2.jpeg', 'kicker' => 'Coming Next', 'title' => 'Live Music Nights', 'body' => 'Small, lively nights with music, drinks and the kind of atmosphere that does not need shouting.', 'link_text' => 'Enquire', 'link_url' => '/visit#reserve'],
                ['bg_image' => 'champagne.jpeg', 'kicker' => 'Past & Future', 'title' => 'Social Gatherings', 'body' => 'From daytime meetups to evening drinks, HoneyBadger is built for events with personality.', 'link_text' => 'Visit / Contact', 'link_url' => '/visit'],
            ]),
            self::list('quotes', 'Customer quotes', self::quoteItems(), [
                ['quote' => 'Vicious little bastard. Beautiful little bar.', 'attribution' => 'House nature'],
                ['quote' => 'Coffee in the claws. Cocktails after dark.', 'attribution' => 'All-day bite'],
                ['quote' => 'Good manners at the door. Sharp teeth behind the bar.', 'attribution' => 'House rule'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Plan an event'),
            self::textarea('cta_body', 'Bottom banner text', 'Ask us about evening tables, opening party bookings, music nights or a social gathering at HoneyBadger.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Reserve / Enquire'),
            self::text('cta_2', 'Bottom banner button 2 text', 'Back to Home'),
        ];
    }

    private static function happyHour(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Happy Hour | HoneyBadger Norwich'),
            self::metaDescription('Badger Hours: rotating coffee, cocktail, wine and food deals at HoneyBadger Norwich, Red Lion Street. Daytime coffee offers through to evening cocktail deals.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Badger Hours'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Happy hours with teeth.'),
            self::textarea('hero_intro', 'Top banner text', 'The clock hits the right hour, the badger sharpens its claws, and the bar starts making little deals with your evening.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Reserve a Table'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'Explore Cocktails'),
            self::image('deals_bg_image', 'Deals poster photo', 'happyhour.jpg'),
            self::text('deals_stamp', 'Deals badge text', 'Coming to the counter'),
            self::text('deals_heading', 'Deals main heading', 'Badger Hours'),
            self::textarea('deals_body', 'Deals text', 'Rotating drinks and food offers for the hours when Norwich needs a little bite. Coffee first, cocktails later, no sad little discounts dressed as excitement.'),
            self::list('deal_cards', 'Deals list', [self::text('time', 'Time'), self::text('title', 'Title'), self::textarea('copy', 'Text'), self::image('bg_image', 'Photo')], [
                ['time' => 'Weekday afternoons', 'title' => 'Coffee Claws', 'copy' => 'Daytime coffee and iced drink offers for quick visits, slow pauses and people who deserve better than beige caffeine.', 'bg_image' => 'coffee.jpeg'],
                ['time' => 'After-work hours', 'title' => 'Cocktail Bite', 'copy' => 'Selected cocktail offers when the day loosens its tie and the badger starts smiling with teeth.', 'bg_image' => 'cocktail-in-the-sun.jpeg'],
                ['time' => 'Golden hour', 'title' => 'Wine & Spirit Pounce', 'copy' => 'Rotating wine, spirit and mixer offers for a slower, sharper finish to the day.', 'bg_image' => 'champagne.jpeg'],
                ['time' => 'Kitchen moments', 'title' => 'Snack Attack', 'copy' => 'Food and drink pairings for sandwich hunters, light-bite grazers and opening-party appetites.', 'bg_image' => 'sandwiches.jpg'],
            ]),
            self::textarea('deals_note', 'Small print note', 'Deals will rotate. Availability may change. Responsible service always applies. Ask at the bar for today’s bite.'),
            self::list('photos', 'Photo gallery', self::photoItems(), [
                ['image' => 'aslan-wine-table.jpeg', 'alt' => 'Wine served at HoneyBadger Norwich'],
                ['image' => 'aslan-cocktail-mural.jpeg', 'alt' => 'Cocktails in front of the HoneyBadger mural'],
                ['image' => 'aslan-pink-cocktail.jpeg', 'alt' => 'A pink cocktail at HoneyBadger Norwich'],
                ['image' => 'aslan-cocktail-on-ice.jpeg', 'alt' => 'A HoneyBadger cocktail on ice'],
                ['image' => 'aslan-daiquiri.jpeg', 'alt' => 'A daiquiri garnished with lemon'],
                ['image' => 'aslan-cocktail-orange-twist-2.jpeg', 'alt' => 'A cocktail with an orange twist garnish'],
            ]),
            self::list('hours_strip', 'Hours list', [self::text('label', 'Time of day'), self::text('text', 'Text')], [
                ['label' => 'Morning', 'text' => 'Coffee in the claws.'],
                ['label' => 'Afternoon', 'text' => 'Iced drinks and snack attacks.'],
                ['label' => 'After work', 'text' => 'Cocktails with a little bite.'],
                ['label' => 'Evening', 'text' => 'Wine, spirits and gold dust.'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Want the day’s deal?'),
            self::textarea('cta_body', 'Bottom banner text', 'Ask at the bar, watch the socials, or come in and let the badger decide what mood the hour deserves.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Reserve a Table'),
            self::text('cta_2', 'Bottom banner button 2 text', 'View Events'),
        ];
    }

    private static function openingParty(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Opening Party | HoneyBadger Norwich'),
            self::metaDescription('Join the HoneyBadger Norwich opening party on 11 July — all-day coffee and kitchen favourites into evening cocktails and a live band. Reserve your table on Red Lion Street.'),
            self::text('hero_eyebrow', 'Top banner small heading', '11 July'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'HoneyBadger Opening Party'),
            self::textarea('hero_intro', 'Top banner text', 'The badger wakes properly: all-day coffee, kitchen favourites, colourful drinks, cocktails and an evening live band. Evening tables are best reserved.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Reserve for Opening Party'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'View Events'),
            self::image('poster_bg_image', 'Poster photo', 'jazz-night.jpeg'),
            self::text('poster_title', 'Poster title (on the photo)', '11 July Launch'),
            self::text('poster_label', 'Poster small heading', 'Featured Event'),
            self::text('poster_heading', 'Poster main heading', 'All-day buzz. Evening band.'),
            self::textarea('poster_body', 'Poster text', 'Daytime coffee and kitchen energy rolls into cocktails, live music and the first proper HoneyBadger night.'),
            self::list('poster_offers', 'Poster list', self::offerItems(), [
                ['label' => 'Morning to Afternoon', 'description' => 'Coffee, iced drinks, smoothies, milkshakes and sandwiches.'],
                ['label' => 'Evening', 'description' => 'Cocktails, live band and a vibrant opening crowd.'],
                ['label' => 'Reservations', 'description' => 'Recommended for evening tables and groups.'],
            ]),
            self::text('poster_cta', 'Poster button text', 'Reserve Now'),
            self::text('cta_heading', 'Bottom banner heading', 'Reserve your opening-night table'),
            self::textarea('cta_body', 'Bottom banner text', 'Opening night carries the full HoneyBadger spirit: colourful, social, warm and a little wild around the edges.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Reserve Now'),
            self::text('cta_2', 'Bottom banner button 2 text', 'Explore Cocktails'),
        ];
    }

    private static function story(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Our Story | HoneyBadger Norwich'),
            self::metaDescription('The story of HoneyBadger Norwich: an independent café-bar on Red Lion Street built on thick skin, good coffee and sharp cocktails, with The Aslan Lounge upstairs.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Our story'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Wounds worn with honour.'),
            self::textarea('hero_intro', 'Top banner text', 'Every independent place that survives gathers a few scars. Ours are not hidden. They are polished, framed, and kept behind the bar with the good bottles.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Visit HoneyBadger'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'Opening Party'),
            self::text('section1_label', '"Six Traits" section small heading', 'Six Traits · One Philosophy'),
            self::text('section1_heading', '"Six Traits" section main heading', 'The anatomy of a HoneyBadger.'),
            self::textarea('section1_intro', '"Six Traits" section text', 'HoneyBadger is not just a name on the door. It is a way of standing your ground, making good coffee, serving proper food, pouring sharp drinks, and refusing to become beige.'),
            self::list('traits', 'Six traits grid', [self::text('title', 'Title'), self::text('subtitle', 'Subtitle'), self::textarea('body', 'Text')], [
                ['title' => 'The Thick Skin', 'subtitle' => 'We have heard it all before', 'body' => 'Honey badger skin is famously tough. When something grabs it, it turns around inside its own hide and bites back. Independent hospitality asks for the same gift: softness for guests, armour for storms.'],
                ['title' => "Doesn't Care", 'subtitle' => 'Trend-proof by nature', 'body' => 'The honey badger has never asked permission to be itself. It eats what it wants, sleeps where it wants, and gets on with the day. Same energy here: coffee, food, cocktails, music and no nervous little apologies.'],
                ['title' => 'Eats Snakes', 'subtitle' => 'Takes on the big ones', 'body' => 'Black mambas. King cobras. Puff adders. It gets bitten, collapses briefly, then gets back up and finishes the meal. We admire this approach to adversity enormously.'],
                ['title' => 'The Honey Guide', 'subtitle' => 'Instinct finds the good stuff', 'body' => 'The real honey badger follows the bird to the hive. Instinct, trust and hunger lead to the golden thing. We follow the same trail: good guests, good suppliers, good flavours, good nights.'],
                ['title' => 'Escape Artist', 'subtitle' => 'Cannot be put in a box', 'body' => 'Captive honey badgers have used rocks, branches and pure refusal to escape enclosures. We are not a chain, not a category, not a sleepy template. We are leaving through the roof if necessary.'],
                ['title' => 'The Musk', 'subtitle' => 'The scent is unmistakable', 'body' => 'The honey badger has a scent that announces itself. Ours smells better: roasting coffee, warm bread, honeyed gold, something fresh from the kitchen and something dangerous from the bar.'],
            ]),
            self::text('quote1_text', 'Pull quote 1', '"The honey badger takes a cobra bite, collapses theatrically, gets back up, and finishes its meal."'),
            self::text('quote1_attribution', 'Pull quote 1 — who said it', 'On resilience, stubbornness and excellent coffee'),
            self::text('section2_label', '"Scar Collection" section small heading', 'The Scar Collection'),
            self::text('section2_heading', '"Scar Collection" section main heading', 'Wounds worn with honour.'),
            self::textarea('section2_intro', '"Scar Collection" section text', 'Every independent place that survives gathers a collection of battle scars. We wear ours like medals, then open the doors again in the morning.'),
            self::list('medals', 'Medals grid', [self::text('icon', 'Icon (emoji)'), self::text('title', 'Title line 1'), self::text('title_line2', 'Title line 2'), self::text('subtitle', 'Subtitle')], [
                ['icon' => '🐍', 'title' => 'Cobra Bitten', 'title_line2' => 'Still Standing', 'subtitle' => 'Awarded: multiple times'],
                ['icon' => '⚡', 'title' => 'Took the Storm', 'title_line2' => "Didn't Go Down", 'subtitle' => 'First class, with stubbornness'],
                ['icon' => '🗺️', 'title' => 'Territory', 'title_line2' => 'Secured — NR1', 'subtitle' => 'Ground floor, Red Lion Street'],
                ['icon' => '🦁', 'title' => 'The Lion', 'title_line2' => 'Upstairs', 'subtitle' => 'Two moods, one building'],
                ['icon' => '☕', 'title' => 'Kept Making', 'title_line2' => 'Good Coffee', 'subtitle' => 'Throughout all of the above'],
                ['icon' => '🎨', 'title' => 'Klimt Still', 'title_line2' => 'On the Walls', 'subtitle' => 'Unmoved. Unbothered.'],
            ]),
            self::text('quote2_text', 'Pull quote 2', '"Every scar is a story. Every story ends the same way: we opened in the morning, made good food, poured honest coffee, and were still here when everyone said we wouldn\'t be."'),
            self::text('quote2_attribution', 'Pull quote 2 — who said it', 'HoneyBadger Norwich · Ground Floor · Still Here'),
            self::text('section3_label', '"Chronicle" section small heading', 'The Chronicle'),
            self::text('section3_heading', '"Chronicle" section main heading', 'How we got here.'),
            self::textarea('section3_intro', '"Chronicle" section text', 'An honest account, told in honey badger terms, which is the only way it makes any sense.'),
            self::list('timeline', 'Timeline', [self::text('date_label', 'Date / era'), self::text('title', 'Title'), self::textarea('body', 'Text')], [
                ['date_label' => 'The Beginning', 'title' => 'We found the burrow on Red Lion Street', 'body' => 'One ground floor. One vision. Mediterranean warmth, honest coffee, Klimt on the walls and a name that said everything about our attitude. Norwich did not know what was coming.'],
                ['date_label' => 'The Biting Season', 'title' => 'Then came the attacks', 'body' => 'Every independent place has a biting season. Ours arrived wearing several faces and came from several angles at once, which is, if nothing else, very efficient.'],
                ['date_label' => 'The Limp', 'title' => 'We briefly went limp. It was fine.', 'body' => 'This is a documented honey badger thing. After a cobra strike, the honey badger collapses for a few minutes. Looks dead. Is not dead. It has gone somewhere quiet to process the venom and formulate a response.'],
                ['date_label' => 'The Rising', 'title' => 'We got back up and finished the meal', 'body' => 'The honey badger always gets back up. That part is not optional. We opened the doors, made the coffee, put the music on and were still here when everyone expected otherwise.'],
                ['date_label' => 'The Lion Arrives', 'title' => 'The Aslan took the first floor', 'body' => 'The Aslan Lounge brought a second mood to the building: quieter, curated, more reserved. The lion upstairs, the badger downstairs. Different worlds, same address.'],
                ['date_label' => 'The Present', 'title' => 'Ground floor. Doors open. Always.', 'body' => 'The honey badger guards the ground floor, welcomes the community, makes excellent coffee and occasionally dangerous cocktails. The Klimt murals remain unmoved. So do we.'],
            ]),
            self::list('photos', 'Photo gallery', self::photoItems(), [
                ['image' => 'the-aslan-lounge.jpeg', 'alt' => 'The Aslan Lounge seating area'],
                ['image' => 'the-aslan-lounge-2.jpeg', 'alt' => 'Mirror and mural inside the Aslan Lounge'],
                ['image' => 'the-aslan-lounge-3.jpeg', 'alt' => 'Wine and mural artwork in the Aslan Lounge'],
                ['image' => 'the-aslan-lounge-4.jpeg', 'alt' => 'Cosy booth seating in the Aslan Lounge'],
                ['image' => 'aslan-mural-portrait.jpeg', 'alt' => 'Close-up of the Klimt-style mural'],
                ['image' => 'cheers.jpeg', 'alt' => 'A toast in front of the HoneyBadger mural'],
            ]),
            self::list('worlds', 'The Badger / The Lion cards', [self::text('title', 'Title'), self::textarea('body', 'Text')], [
                ['title' => 'The Badger', 'body' => 'Ground-floor energy. Coffee, kitchen, colourful drinks, sandwiches, smoothies, cocktails and the kind of room that refuses to be dull.'],
                ['title' => 'The Lion', 'body' => 'The Aslan Lounge upstairs: quieter, more curated, more private. A different pace above the same heartbeat.'],
            ]),
            self::text('cta_heading', 'Bottom banner heading', 'Still here. Still pouring.'),
            self::textarea('cta_body', 'Bottom banner text', 'The story is not polished flat. It has scratches, gold dust, teeth marks and a door that keeps opening.'),
            self::text('cta_1', 'Bottom banner button 1 text', 'Visit HoneyBadger'),
            self::text('cta_2', 'Bottom banner button 2 text', 'Opening Party'),
        ];
    }

    private static function visit(): array
    {
        return [
            self::text('page_title', 'Browser tab title', 'Visit & Reserve | HoneyBadger Norwich'),
            self::metaDescription('Visit HoneyBadger Norwich at 1 Red Lion Street, Norwich. Reserve a table, ask about the opening party, or send an enquiry for an evening or event.'),
            self::text('hero_eyebrow', 'Top banner small heading', 'Visit / Reserve'),
            self::heroImage(),
            self::text('hero_heading', 'Top banner main heading', 'Visit HoneyBadger Norwich'),
            self::textarea('hero_intro', 'Top banner text', 'Find us at 1 Red Lion Street, reserve for the opening party or send an enquiry for a daytime visit, evening table or event.'),
            self::text('hero_cta_1', 'Top banner button 1 text', 'Reserve a Table'),
            self::text('hero_cta_2', 'Top banner button 2 text', 'Opening Party'),
            self::text('find_us_heading', '"Find Us" box heading', 'Find Us'),
            self::text('find_us_address_text', 'Address', '1 Red Lion Street, Norwich.'),
            self::text('find_us_email_text', 'Email address shown', 'bookings@thehoneybadgernorwich.co.uk'),
            self::text('find_us_instagram_text', 'Instagram link text', 'Follow HoneyBadger Norwich on Instagram'),
            self::text('find_us_openingparty_text', 'Opening Party line', '11 July, all day, with live band in the evening.'),
            self::text('find_us_bestfor_text', '"Best for" text', 'Coffee dates, daytime visits, early evening drinks, opening night plans.'),
            self::text('redlion_heading', '"Red Lion Street" box heading', 'Red Lion Street'),
            self::textarea('redlion_body', '"Red Lion Street" box text', 'Ground-floor HoneyBadger energy, with The Aslan Lounge above for a different evening mood.'),
            self::text('reservations_heading', '"Reservations" box heading', 'Reservations & Enquiries'),
            self::textarea('reservations_body', '"Reservations" box text', 'Send a booking enquiry for the opening party, an evening table, a daytime visit or a future event.'),
        ];
    }
}
