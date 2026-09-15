<x-layouts.structure>

    <x-slot name="title">{{ page_field('visit', 'page_title', 'Visit & Reserve | HoneyBadger Norwich') }}</x-slot>
    <x-slot name="description">{{ page_field('visit', 'meta_description', 'Visit HoneyBadger Norwich at 1 Red Lion Street, Norwich. Reserve a table, ask about the opening party, or send an enquiry for an evening or event.') }}</x-slot>
    <x-slot name="image">{{ page_image('visit', 'hero_image', 'honeybadger-logo.png') }}</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">
                        {{ page_field('visit', 'hero_eyebrow', 'Visit / Reserve') }}
                    </div>
                    <x-editable-heading page="visit" field="hero_heading" tag="h1" class="page-title">Visit HoneyBadger
                        <em>Norwich</em></x-editable-heading>
                    <p class="page-intro">
                        {{ page_field('visit', 'hero_intro', 'Find us at 1 Red Lion Street, reserve for the opening party or send an enquiry for a daytime visit, evening table or event.') }}
                    </p>
                    <div class="page-actions">
                        <a class="btn-g" href="#reserve">
                            {{ page_field('visit', 'hero_cta_1', 'Reserve a Table') }}
                        </a>
                        <a class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>
                            {{ page_field('visit', 'hero_cta_2', 'Opening Party') }}
                        </a>
                    </div>
                </div>
                <div class="logo-panel rv on">
                    <img src="{{ page_image('visit', 'hero_image', 'honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                </div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-honey" id="reserve">
            <div class="wrap two">
                <div class="panel texture-emerald rv">
                    <h2>{{ page_field('visit', 'find_us_heading', 'Find Us') }}</h2>
                    <ul class="offer">
                        <li>
                            <strong>Address</strong>
                            <a href="https://maps.app.goo.gl/KRvarF68HCXDDYmQ7" target="_blank">
                            {{ page_field('visit', 'find_us_address_text', '1 Red Lion Street, Norwich.') }}
                            </a>
                        </li>
                        <li>
                            <strong>Email</strong>
                            <a target="_blank" href="mailto:bookings@thehoneybadgernorwich.co.uk">
                            {{ page_field('visit', 'find_us_email_text', 'bookings@thehoneybadgernorwich.co.uk') }}
                            </a>
                        </li>
                        <li>
                            <strong>Instagram</strong>
                            <a href="https://www.instagram.com/honeybadgernorwich/" target="_blank" rel="noopener">
                                {{ page_field('visit', 'find_us_instagram_text', 'Follow HoneyBadger Norwich on Instagram') }}
                            </a>
                        </li>
                        <li>
                            <strong>Opening Party</strong>
                            <a href="{{ route('opening_party') }}" wire:navigate>
                            {{ page_field('visit', 'find_us_openingparty_text', '11 July, all day, with live band in the evening.') }}
                            </a>
                        </li>
                        <li><strong>Best for</strong>{{ page_field('visit', 'find_us_bestfor_text', 'Coffee dates, daytime visits, early evening drinks, opening night plans.') }}</li>
                    </ul>
                    <div class="panel texture-honey" style="margin-top:1.5rem;text-align:center">
                        <h2 style="font-size:1.6rem">{{ page_field('visit', 'redlion_heading', 'Red Lion Street') }}</h2>
                        <p>
                            {{ page_field('visit', 'redlion_body', 'Ground-floor HoneyBadger energy, with The Aslan Lounge above for a different evening mood.') }}
                        </p>
                    </div>
                </div>
                <div class="panel texture-gold rv">
                    <h2>{{ page_field('visit', 'reservations_heading', 'Reservations & Enquiries') }}</h2>
                    <p>{{ page_field('visit', 'reservations_body', 'Send a booking enquiry for the opening party, an evening table, a daytime visit or a future event.') }}</p>
                    @if (session('visit_status') === 'success')
                        <p class="form-status form-status-success">Thanks — your enquiry has been sent. We'll be in touch shortly.</p>
                    @endif
                    @if ($errors->any())
                        <p class="form-status form-status-error">Please check the form: {{ $errors->first() }}</p>
                    @endif
                    <form class="form" action="{{ route('visit.submit') }}" method="POST">
                        @csrf
                        <input type="text" name="website" tabindex="-1" autocomplete="off"
                            style="position:absolute;left:-9999px;opacity:0;height:0;width:0;" aria-hidden="true">
                        <div class="form-grid"><input name="Name" placeholder="Your name" value="{{ old('Name') }}" required><input
                                name="Email" placeholder="Your email" type="email" value="{{ old('Email') }}" required><input name="Phone"
                                placeholder="Phone number" value="{{ old('Phone') }}"><select name="Enquiry_type">
                                <option @selected(old('Enquiry_type') === 'Opening Party reservation')>Opening Party reservation</option>
                                <option @selected(old('Enquiry_type') === 'Table reservation')>Table reservation</option>
                                <option @selected(old('Enquiry_type') === 'Event enquiry')>Event enquiry</option>
                                <option @selected(old('Enquiry_type') === 'General enquiry')>General enquiry</option>
                            </select>
                            <textarea class="full" name="Message" placeholder="Tell us your preferred date, time, party size and any notes.">{{ old('Message') }}</textarea>
                        </div><button class="btn-g" type="submit">Send Enquiry</button>
                    </form>
                </div>
            </div>
        </section>
    </x-slot>
</x-layouts.structure>
