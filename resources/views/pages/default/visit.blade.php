<x-layouts.structure>

    <x-slot name="title">Happy Hour</x-slot>

    <x-slot name="content">

        <header class="page-hero">
            <div class="wrap page-grid">
                <div class="rv on">
                    <div class="eyebrow">
                        Visit / Reserve
                    </div>
                    <h1 class="page-title">
                        Visit HoneyBadger 
                        <em>Norwich</em>
                    </h1>
                    <p class="page-intro">
                        Find us at 1 Red Lion Street, reserve for the opening party or send an enquiry
                        for a daytime visit, evening table or event.
                    </p>
                    <div class="page-actions">
                        <a class="btn-g" href="#reserve">
                            Reserve a Table
                        </a>
                        <a class="btn-ghost" href="{{ route('opening_party') }}" wire:navigate>
                            Opening Party
                        </a>
                    </div>
                </div>
                <div class="logo-panel rv on">
                    <img src="{{ asset('/images/honeybadger-logo.png') }}" alt="HoneyBadger Norwich logo">
                </div>
            </div>
        </header>
        <div class="pat-gold"></div>
        <div class="pat-green"></div>
        <section class="section cream textured-honey" id="reserve">
            <div class="wrap two">
                <div class="panel texture-emerald rv">
                    <h2>Find Us</h2>
                    <ul class="offer">
                        <li>
                            <strong>Address</strong>
                            <a href="https://maps.app.goo.gl/KRvarF68HCXDDYmQ7" target="_blank">
                            1 Red Lion Street, Norwich.
                            </a>
                        </li>
                        <li>
                            <strong>Email</strong>
                            <a target="_blank" href="mailto:bookings@thehoneybadgernorwich.co.uk">
                            bookings@thehoneybadgernorwich.co.uk
                            </a>
                        </li>
                        <li>
                            <strong>Instagram</strong>
                            <a href="https://www.instagram.com/honeybadgernorwich/" target="_blank" rel="noopener">
                                Follow HoneyBadger Norwich on Instagram
                            </a>
                        </li>
                        <li>
                            <strong>Opening Party</strong>
                            <a href="{{ route('opening_party') }}" wire:navigate>
                            11 July, all day, with live band in the evening.
                            </a>
                        </li>
                        <li><strong>Best for</strong>Coffee dates, daytime visits, early evening drinks, opening night
                            plans.</li>
                    </ul>
                    <div class="panel texture-honey" style="margin-top:1.5rem;text-align:center">
                        <h2 style="font-size:1.6rem">Red Lion Street</h2>
                        <p>
                            Ground-floor HoneyBadger energy, with The Aslan Lounge above for a different evening mood.
                        </p>
                    </div>
                </div>
                <div class="panel texture-gold rv">
                    <h2>Reservations & Enquiries</h2>
                    <p>Send a booking enquiry for the opening party, an evening table, a daytime visit or a future
                        event.</p>
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
