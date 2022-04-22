<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Property
 * @package App\Models
 *
 * @property int $id
 * @property int $category_id
 * @property int $type_id
 * @property string $title
 * @property string $description
 * @property int $weight
 * @property int $is_required
 * @property int $is_expandable
 * @property int $is_filter
 * @property int $is_sortable
 *
 * @property Category $modelCategory
 * @property Option[] $modelOptions
 * @property Type $modelType
 * @property Value[] $modelValues
 */
class Property extends Model
{
    public $timestamps = false;
    protected $table = 'properties';

    public function modelCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function modelOptions(): HasMany
    {
        return $this->hasMany(Option::class, 'property_id');
    }

    public function modelType(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function modelValues(): HasMany
    {
        return $this->hasMany(Value::class, 'property_id');
    }
}