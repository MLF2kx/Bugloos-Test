<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Value
 * @package App\Models
 *
 * @property int $id
 * @property int $product_id
 * @property int $property_id
 * @property int $option_id
 * @property string $value
 *
 * @property Option $modelOption
 * @property Product $modelProduct
 * @property Property $modelProperty
 */
class Value extends Model
{
    public $timestamps = false;
    protected $table = 'values';

    public function modelOption(): BelongsTo
    {
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function modelProduct(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function modelProperty(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}