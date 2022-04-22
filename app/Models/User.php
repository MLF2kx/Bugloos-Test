<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Requests
 *
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property int $ts_register
 * @property int $is_active
 *
 * @property Session $modelSessions
 */
class User extends Authenticatable
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'users';

    public function modelSessions(): HasMany
    {
        return $this->hasMany(Session::class, 'user_id');
    }
}
