@props(['page', 'field', 'tag' => 'h2', 'class' => null])
@php $custom = page_field($page, $field, null); @endphp
<{{ $tag }} @if ($class) class="{{ $class }}" @endif>
    @if ($custom)
        {{ $custom }}
    @else
        {{ $slot }}
    @endif
</{{ $tag }}>
