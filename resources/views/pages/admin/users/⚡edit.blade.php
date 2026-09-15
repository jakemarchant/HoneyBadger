<?php

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Admin · Edit user')] class extends Component {
    use PasswordValidationRules;
    use ProfileValidationRules;

    public User $user;

    public string $name = '';

    public string $email = '';

    public bool $is_admin = false;

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = $user->is_admin;
    }

    public function save(): void
    {
        $validated = $this->validate([
            ...$this->profileRules($this->user->id),
            'password' => array_merge(['nullable'], array_slice($this->passwordRules(), 1)),
        ]);

        if ($this->user->id === Auth::id() && ! $this->is_admin) {
            $this->dispatch('toast', variant: 'danger', text: __('You cannot remove your own admin access.'));
            $this->is_admin = true;

            return;
        }

        if ($this->user->is_admin && ! $this->is_admin && User::where('is_admin', true)->count() <= 1) {
            $this->dispatch('toast', variant: 'danger', text: __('You cannot demote the last remaining admin.'));
            $this->is_admin = true;

            return;
        }

        $this->user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_admin' => $this->is_admin,
        ]);

        if (filled($this->password)) {
            $this->user->password = $validated['password'];
        }

        $this->user->save();

        $this->reset(['password', 'password_confirmation']);

        Flux::toast(variant: 'success', text: __('User updated.'));
    }
}; ?>

<div class="flex w-full flex-1 flex-col gap-6">
        <div>
            <flux:heading size="lg">{{ __('Edit user') }}</flux:heading>
            <flux:subheading>{{ $user->email }}</flux:subheading>
        </div>

        <form wire:submit="save" class="max-w-lg space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus />
            <flux:input wire:model="email" :label="__('Email')" type="email" required />

            <flux:switch wire:model="is_admin" :label="__('Admin access')" />

            <flux:separator />

            <flux:text>{{ __('Leave blank to keep the current password.') }}</flux:text>
            <flux:input wire:model="password" :label="__('New password')" type="password" viewable />
            <flux:input wire:model="password_confirmation" :label="__('Confirm new password')" type="password" viewable />

            <div class="flex items-center gap-4">
                <flux:button variant="primary" type="submit">{{ __('Save changes') }}</flux:button>
                <flux:button variant="ghost" :href="route('admin.users.index')" wire:navigate>{{ __('Cancel') }}</flux:button>
            </div>
        </form>
    </div>
