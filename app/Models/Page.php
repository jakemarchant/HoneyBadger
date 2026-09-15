<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $slug
 * @property string $name
 */
#[Fillable(['slug', 'name'])]
class Page extends Model
{
    protected function casts(): array
    {
        return [
            'fields_max_updated_at' => 'datetime',
        ];
    }

    public function fields(): HasMany
    {
        return $this->hasMany(PageField::class)->orderBy('position');
    }
}
