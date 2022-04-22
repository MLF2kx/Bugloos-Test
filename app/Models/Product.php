<?php

namespace App\Models;

use App\Http\Resources\ValueResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property int $price
 * @property int $quantity
 *
 * @property Category $modelCategory
 * @property Value[] $modelValues
 */
class Product extends Model
{
    public $timestamps = false;
    protected $table = 'products';

    public function modelCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function modelValues(): HasMany
    {
        return $this->hasMany(Value::class, 'product_id');
    }

    public function getValues()
    {
        return Value::query()->where('product_id', $this->id)->get();
    }
}