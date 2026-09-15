<?php

use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

if (! function_exists('page_content_cache')) {
    /**
     * All editable field values for a page, keyed by field key.
     * One cache entry per page shared by page_field() and page_image()
     * so text/image/list lookups can never drift out of sync.
     */
    function page_content_cache(string $pageSlug): array
    {
        return Cache::rememberForever("page_content.{$pageSlug}", function () use ($pageSlug) {
            $page = Page::query()->where('slug', $pageSlug)->first();

            if (! $page) {
                return [];
            }

            return $page->fields()->get()->mapWithKeys(fn ($field) => [$field->key => $field->value])->all();
        });
    }
}

if (! function_exists('page_content_forget')) {
    function page_content_forget(string $pageSlug): void
    {
        Cache::forget("page_content.{$pageSlug}");
    }
}

if (! function_exists('page_field')) {
    /**
     * An editable text/textarea/list value for a page, falling back to
     * $default (the site's original hardcoded copy) when nothing has been
     * customized yet, or when the stored value's shape doesn't match the
     * default's (defensive against a malformed/stale row).
     */
    function page_field(string $pageSlug, string $key, mixed $default = null): mixed
    {
        $value = page_content_cache($pageSlug)[$key] ?? null;

        if ($value === null) {
            return $default;
        }

        if (is_array($default) && ! is_array($value)) {
            return $default;
        }

        if (is_string($default) && ! is_string($value)) {
            return $default;
        }

        return $value;
    }
}

if (! function_exists('resolve_page_image')) {
    /**
     * Resolves a raw image value (either an uploaded path on the public
     * disk, or a static public/images/* filename) to a servable URL.
     * Shared by page_image() and by list-type fields (photo strips etc.)
     * where each row's image value is resolved individually.
     */
    function resolve_page_image(mixed $value, ?string $fallbackFilename = null): string
    {
        $fallbackFilename ??= is_string($value) ? $value : '';

        if (is_string($value) && $value !== '' && Storage::disk('public')->exists($value)) {
            return Storage::disk('public')->url($value);
        }

        return asset('/images/'.$fallbackFilename);
    }
}

if (! function_exists('page_image')) {
    /**
     * An editable image field, resolving to the uploaded file's URL on the
     * public disk when present, else the site's original static asset.
     */
    function page_image(string $pageSlug, string $key, string $defaultFilename): string
    {
        $value = page_content_cache($pageSlug)[$key] ?? null;

        return resolve_page_image($value, $defaultFilename);
    }
}
