<?php

use App\Models\Page;
use App\Models\PageField;
use App\Support\PageContentSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\LivewireFilepond\WithFilePond;

new #[Title('Admin · Edit page')] class extends Component {
    use WithFilePond;

    public Page $page;

    public array $schema = [];

    public array $values = [];

    public array $originalValues = [];

    public $activeUpload = null;

    public ?string $uploadFieldKey = null;

    public ?string $uploadListKey = null;

    public ?string $uploadItemId = null;

    public function mount(Page $page): void
    {
        $this->page = $page;
        $this->schema = PageContentSchema::forPage($page->slug);

        $stored = $page->fields()->get()->mapWithKeys(fn ($f) => [$f->key => $f->value])->all();

        foreach ($this->schema as $field) {
            $value = $stored[$field['key']] ?? null;

            if ($field['type'] === 'list') {
                $items = is_array($value) ? $value : $field['default'];
                $items = collect($items)->map(function ($item) {
                    $item['_id'] ??= (string) Str::uuid();

                    return $item;
                })->all();
                $this->values[$field['key']] = $items;
            } else {
                $this->values[$field['key']] = is_string($value) ? $value : $field['default'];
            }
        }

        $this->originalValues = $this->values;
    }

    protected function fieldSchema(string $key): ?array
    {
        return collect($this->schema)->firstWhere('key', $key);
    }

    public function addListItem(string $listKey): void
    {
        $field = $this->fieldSchema($listKey);

        $item = collect($field['items'])->mapWithKeys(fn ($sub) => [$sub['key'] => ''])->all();
        $item['_id'] = (string) Str::uuid();

        $this->values[$listKey][] = $item;
    }

    public function removeListItem(string $listKey, string $itemId): void
    {
        $this->values[$listKey] = collect($this->values[$listKey])
            ->reject(fn ($item) => ($item['_id'] ?? null) === $itemId)
            ->values()
            ->all();
    }

    public function openTopLevelUpload(string $fieldKey): void
    {
        $this->uploadFieldKey = $fieldKey;
        $this->uploadListKey = null;
        $this->uploadItemId = null;
        $this->resetFilePond('activeUpload');
    }

    public function openListItemUpload(string $listKey, string $itemId): void
    {
        $this->uploadFieldKey = null;
        $this->uploadListKey = $listKey;
        $this->uploadItemId = $itemId;
        $this->resetFilePond('activeUpload');
    }

    public function validateUploadedFile(): bool
    {
        if (! $this->activeUpload instanceof TemporaryUploadedFile) {
            return false;
        }

        $valid = Validator::make(
            ['activeUpload' => $this->activeUpload],
            ['activeUpload' => ['image', 'max:5120']],
        )->passes();

        if (! $valid) {
            $this->dispatch('toast', variant: 'danger', text: __('Please upload a valid image under 5MB.'));

            return false;
        }

        $path = $this->activeUpload->store("pages/{$this->page->slug}", 'public');

        if ($this->uploadListKey && $this->uploadItemId) {
            $items = $this->values[$this->uploadListKey] ?? [];
            foreach ($items as $i => $item) {
                if (($item['_id'] ?? null) === $this->uploadItemId) {
                    $items[$i]['image'] = $path;
                }
            }
            $this->values[$this->uploadListKey] = $items;
        } elseif ($this->uploadFieldKey) {
            $this->values[$this->uploadFieldKey] = $path;
        }

        $this->dispatch('toast', variant: 'success', text: __('Photo uploaded — remember to save your changes.'));

        return true;
    }

    /** All image paths (top-level + inside list items) referenced by a given values array. */
    protected function extractImagePaths(array $values): array
    {
        $paths = [];

        foreach ($this->schema as $field) {
            if ($field['type'] === 'image') {
                $value = $values[$field['key']] ?? null;
                if (is_string($value) && $value !== '') {
                    $paths[] = $value;
                }
            } elseif ($field['type'] === 'list') {
                $imageSubKeys = collect($field['items'])->where('type', 'image')->pluck('key');
                foreach (($values[$field['key']] ?? []) as $item) {
                    foreach ($imageSubKeys as $subKey) {
                        $value = $item[$subKey] ?? null;
                        if (is_string($value) && $value !== '') {
                            $paths[] = $value;
                        }
                    }
                }
            }
        }

        return $paths;
    }

    public function save(): void
    {
        $oldPaths = $this->extractImagePaths($this->originalValues);

        DB::transaction(function () use ($oldPaths) {
            foreach ($this->schema as $index => $field) {
                PageField::updateOrCreate(
                    ['page_id' => $this->page->id, 'key' => $field['key']],
                    [
                        'label' => $field['label'],
                        'type' => $field['type'],
                        'value' => $this->values[$field['key']],
                        'position' => $index,
                    ],
                );
            }

            DB::afterCommit(function () use ($oldPaths) {
                page_content_forget($this->page->slug);

                $newPaths = $this->extractImagePaths($this->values);
                foreach (array_diff($oldPaths, $newPaths) as $path) {
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            });
        });

        $this->originalValues = $this->values;

        $this->dispatch('toast', variant: 'success', text: __('Page updated.'));
    }
}; ?>

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">{{ $page->name }}</h1>
            <p class="text-muted mb-0">{{ __('Edit the text and photos on this page.') }}</p>
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.pages.index') }}" wire:navigate>{{ __('Back to pages') }}</a>
    </div>

    <form wire:submit="save">
        @foreach ($schema as $field)
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if ($field['type'] === 'text')
                        <div class="form-group mb-0">
                            <label>{{ $field['label'] }}</label>
                            <input type="text" class="form-control" wire:model="values.{{ $field['key'] }}">
                        </div>
                    @elseif ($field['type'] === 'textarea')
                        <div class="form-group mb-0">
                            <label>{{ $field['label'] }}</label>
                            <textarea class="form-control" rows="3" wire:model="values.{{ $field['key'] }}"></textarea>
                        </div>
                    @elseif ($field['type'] === 'image')
                        <label class="mb-2 d-block">{{ $field['label'] }}</label>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ resolve_page_image($values[$field['key']], $field['default']) }}" alt="" class="rounded mr-3" style="height: 5rem; width: 8rem; object-fit: cover;">
                            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#image-upload-modal" wire:click="openTopLevelUpload('{{ $field['key'] }}')">{{ __('Replace photo') }}</button>
                        </div>
                    @elseif ($field['type'] === 'list')
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <label class="mb-0">{{ $field['label'] }}</label>
                            <button type="button" class="btn btn-sm btn-outline-primary" wire:click="addListItem('{{ $field['key'] }}')">
                                <i class="fas fa-plus fa-sm"></i> {{ __('Add item') }}
                            </button>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            @foreach ($values[$field['key']] as $index => $item)
                                <div wire:key="item-{{ $item['_id'] }}" class="d-flex align-items-start bg-light rounded p-3 mb-3">
                                    <div class="flex-grow-1">
                                        @foreach ($field['items'] as $sub)
                                            @if ($sub['type'] === 'image')
                                                <div class="mb-2">
                                                    <label class="small mb-1 d-block">{{ $sub['label'] }}</label>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="{{ resolve_page_image($item[$sub['key']] ?? '', $item[$sub['key']] ?? '') }}" alt="" class="rounded mr-2" style="height: 3.5rem; width: 5rem; object-fit: cover;">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#image-upload-modal" wire:click="openListItemUpload('{{ $field['key'] }}', '{{ $item['_id'] }}')">{{ __('Replace') }}</button>
                                                    </div>
                                                </div>
                                            @elseif ($sub['type'] === 'textarea')
                                                <div class="form-group mb-2">
                                                    <label class="small">{{ $sub['label'] }}</label>
                                                    <textarea class="form-control" rows="2" wire:model="values.{{ $field['key'] }}.{{ $index }}.{{ $sub['key'] }}"></textarea>
                                                </div>
                                            @else
                                                <div class="form-group mb-2">
                                                    <label class="small">{{ $sub['label'] }}</label>
                                                    <input type="text" class="form-control" wire:model="values.{{ $field['key'] }}.{{ $index }}.{{ $sub['key'] }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-danger ml-3" wire:click="removeListItem('{{ $field['key'] }}', '{{ $item['_id'] }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
        </div>
    </form>

    <div class="modal fade" id="image-upload-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Upload photo') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <x-filepond::upload wire:model="activeUpload" />
                </div>
            </div>
        </div>
    </div>
</div>
