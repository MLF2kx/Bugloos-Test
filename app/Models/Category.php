<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 *
 * @property Category[] $modelChildren
 * @property Category $modelParent
 * @property Product[] $modelProducts
 * @property Property[] $modelProperties
 */
class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';

    public function modelChildren(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function modelParent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function modelProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function modelProperties(): HasMany
    {
        return $this->hasMany(Property::class, 'category_id');
    }

    public function getRecursivePropertyIDs(): array
    {
        /** @var Property $property */
        $result = [];
        foreach (Property::query()->select('id')->where('category_id', $this->id)->get() as $property) {
            $result[] = $property->id;
        }
        if ($this->modelParent) {
            $result = array_merge($result, $this->modelParent->getRecursivePropertyIDs());
        }
        return array_unique($result);
    }
}