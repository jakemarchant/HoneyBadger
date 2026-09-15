<?php

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Admin · New user')] class extends Component {
    use PasswordValidationRules;
    use ProfileValidationRules;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $is_admin = false;

    public function save(): void
    {
        $validated = $this->validate([
            ...$this->profileRules(),
            'password' => $this->passwordRules(),
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'is_admin' => $this->is_admin,
        ]);

        $this->dispatch('toast', variant: 'success', text: __('User created.'));

        $this->redirect(route('admin.users.index'), navigate: true);
    }
}; ?>

<div>
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('New user') }}</h1>
        <p class="text-muted mb-0">{{ __('Create an admin or staff login.') }}</p>
    </div>

    <div class="card shadow mb-4" style="max-width: 32rem;">
        <div class="card-body">
            <form wire:submit="save">
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" class="form-control" wire:model="name" required autofocus>
                </div>
                <div class="form-group">
                    <label>{{ __('Email') }}</label>
                    <input type="email" class="form-control" wire:model="email" required>
                </div>
                <div class="form-group">
                    <label>{{ __('Password') }}</label>
                    <input type="password" class="form-control" wire:model="password" required>
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm password') }}</label>
                    <input type="password" class="form-control" wire:model="password_confirmation" required>
                </div>
                <div class="custom-control custom-switch mb-4">
                    <input type="checkbox" class="custom-control-input" id="is_admin" wire:model="is_admin">
                    <label class="custom-control-label" for="is_admin">{{ __('Admin access') }}</label>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-primary mr-2">{{ __('Create user') }}</button>
                    <a class="btn btn-secondary" href="{{ route('admin.users.index') }}" wire:navigate>{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
