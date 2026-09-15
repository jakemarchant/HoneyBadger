<?php

use App\Models\Enquiry;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Admin · Enquiries')] class extends Component {
    use WithPagination;

    public bool $unreadOnly = false;

    public ?int $expanded = null;

    public function toggleExpanded(int $id): void
    {
        $this->expanded = $this->expanded === $id ? null : $id;
    }

    public function markAsRead(int $id): void
    {
        Enquiry::findOrFail($id)->markAsRead();
    }

    public function markAsUnread(int $id): void
    {
        Enquiry::findOrFail($id)->markAsUnread();
    }

    public function getEnquiriesProperty()
    {
        return Enquiry::query()
            ->when($this->unreadOnly, fn ($query) => $query->unread())
            ->latest()
            ->paginate(15);
    }
}; ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">{{ __('Enquiries') }}</h1>
        <p class="text-muted mb-0">{{ __('Reservation and contact form submissions from the Visit page.') }}</p>
    </div>

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-sm {{ $unreadOnly ? 'btn-outline-primary' : 'btn-primary' }}" wire:click="$set('unreadOnly', false)">
            {{ __('All') }}
        </button>
        <button type="button" class="btn btn-sm {{ $unreadOnly ? 'btn-primary' : 'btn-outline-primary' }}" wire:click="$set('unreadOnly', true)">
            {{ __('Unread') }}
        </button>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Received') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->enquiries as $enquiry)
                        <tr wire:key="enquiry-{{ $enquiry->id }}">
                            <td>
                                @if ($enquiry->read_at)
                                    <span class="badge badge-secondary">{{ __('Read') }}</span>
                                @else
                                    <span class="badge badge-warning">{{ __('Unread') }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="font-weight-bold text-gray-800">{{ $enquiry->name }}</div>
                                <div class="small text-gray-500">{{ $enquiry->email }}</div>
                                @if ($enquiry->phone)
                                    <div class="small text-gray-500">{{ $enquiry->phone }}</div>
                                @endif
                            </td>
                            <td class="text-gray-700">{{ $enquiry->enquiry_type }}</td>
                            <td class="text-gray-500">{{ $enquiry->created_at->format('d M Y, H:i') }}</td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-secondary" wire:click="toggleExpanded({{ $enquiry->id }})">
                                        {{ $expanded === $enquiry->id ? __('Hide') : __('View') }}
                                    </button>

                                    @if ($enquiry->read_at)
                                        <button type="button" class="btn btn-sm btn-secondary" wire:click="markAsUnread({{ $enquiry->id }})">
                                            {{ __('Mark unread') }}
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-secondary" wire:click="markAsRead({{ $enquiry->id }})">
                                            {{ __('Mark read') }}
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @if ($expanded === $enquiry->id)
                            <tr wire:key="enquiry-{{ $enquiry->id }}-detail">
                                <td colspan="5" class="bg-light text-gray-700">
                                    {{ $enquiry->message ?: __('No message provided.') }}
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500 py-5">
                                {{ __('No enquiries yet.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $this->enquiries->links('pagination::bootstrap-4') }}
    </div>
</div>
