<?php

use App\Models\Page;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Admin · Pages')] class extends Component {
    public function getPagesProperty()
    {
        return Page::query()
            ->withMax('fields', 'updated_at')
            ->orderBy('name')
            ->get();
    }
}; ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Pages') }}</h1>
</div>
<p class="text-muted">{{ __('Edit the text and photos shown on each public page.') }}</p>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Page') }}</th>
                        <th>{{ __('Last edited') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->pages as $page)
                        <tr wire:key="page-{{ $page->id }}">
                            <td class="font-weight-bold text-gray-800">{{ $page->name }}</td>
                            <td class="text-gray-500">
                                {{ $page->fields_max_updated_at ? $page->fields_max_updated_at->diffForHumans() : __('Never edited') }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.pages.edit', $page) }}" wire:navigate>
                                    {{ __('Edit') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
