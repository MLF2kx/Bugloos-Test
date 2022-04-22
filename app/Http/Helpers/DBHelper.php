<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DBHelper
{

    public static function queryLog(Builder $query): string
    {
        return Str::replaceArray('?', $query->getBindings(), $query->toSql());
    }
}