<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Type
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 *
 * @property Property[] $modelProperties
 */
class Type extends Model
{
    public $timestamps = false;
    protected $table = 'types';

    public function modelProperties(): HasMany
    {
        return $this->hasMany(Property::class, 'type_id');
    }
}