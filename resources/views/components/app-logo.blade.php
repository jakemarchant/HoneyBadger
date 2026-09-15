@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="HoneyBadger Norwich" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-black">
            <img src="{{ asset('/images/honeybadger-mark.png') }}" alt="HoneyBadger Norwich" class="size-6 object-contain">
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="HoneyBadger Norwich" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-md bg-black">
            <img src="{{ asset('/images/honeybadger-mark.png') }}" alt="HoneyBadger Norwich" class="size-6 object-contain">
        </x-slot>
    </flux:brand>
@endif
