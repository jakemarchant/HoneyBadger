<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Admin · Users')] class extends Component {
    public function deleteUser(int $id): void
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            $this->dispatch('toast', variant: 'danger', text: __('You cannot delete your own account.'));

            return;
        }

        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
            $this->dispatch('toast', variant: 'danger', text: __('You cannot delete the last remaining admin.'));

            return;
        }

        $user->delete();

        $this->dispatch('toast', variant: 'success', text: __('User deleted.'));
    }

    public function getUsersProperty()
    {
        return User::query()->orderBy('name')->get();
    }
}; ?>

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">{{ __('Users') }}</h1>
            <p class="text-muted mb-0">{{ __('Manage who can sign in to the admin area.') }}</p>
        </div>

        <a class="btn btn-primary" href="{{ route('admin.users.create') }}" wire:navigate>
            <i class="fas fa-plus fa-sm"></i> {{ __('New user') }}
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Joined') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->users as $user)
                            <tr wire:key="user-{{ $user->id }}">
                                <td class="font-weight-bold text-gray-800">
                                    {{ $user->name }}
                                    @if ($user->id === auth()->id())
                                        <span class="badge badge-secondary">{{ __('You') }}</span>
                                    @endif
                                </td>
                                <td class="text-gray-500">{{ $user->email }}</td>
                                <td>
                                    @if ($user->is_admin)
                                        <span class="badge badge-success">{{ __('Admin') }}</span>
                                    @else
                                        <span class="badge badge-secondary">{{ __('Staff') }}</span>
                                    @endif
                                </td>
                                <td class="text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.users.edit', $user) }}" wire:navigate>
                                            {{ __('Edit') }}
                                        </a>
                                        @if ($user->id !== auth()->id())
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete-user-{{ $user->id }}">
                                                {{ __('Delete') }}
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($this->users as $user)
        <div class="modal fade" id="delete-user-{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true" wire:key="delete-modal-{{ $user->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete :name?', ['name' => $user->name]) }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('This cannot be undone.') }}</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click="deleteUser({{ $user->id }})">{{ __('Delete user') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
