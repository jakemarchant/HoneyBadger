<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $page_id
 * @property string $key
 * @property string $label
 * @property string $type
 * @property mixed $value
 * @property int $position
 */
#[Fillable(['page_id', 'key', 'label', 'type', 'value', 'position'])]
class PageField extends Model
{
    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
