<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Option
 * @package App\Model
 *
 * @property int $id
 * @property int $property_id
 * @property string $value
 * @property integer $is_new
 *
 * @property Property $modelProperty
 * @property Value[] $modelValues
 */
class Option extends Model
{
    public $timestamps = false;
    protected $table = 'options';

    public function modelProperty(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function modelValues(): HasMany
    {
        return $this->hasMany(Value::class, 'option_id');
    }
}