<?php

namespace App\Models;

use App\Http\Helpers\JWTHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Str;

/**
 * Class Session
 * @package App\Models
 *
 * @property string $id
 * @property string $user_id
 * @property string $token
 * @property string $refresh
 * @property string $ip
 * @property string $device
 * @property int $ts_login
 *
 * @property User $modelUser
 */
class Session extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'sessions';

    public static function generate(User $user): ?self
    {
        $now = time();
        $request = request();
        $session = new self();
        $id = Str::uuid();
        $session->id = $id;
        $session->token = JWTHelper::createToken($id, $user)->toString();
        $session->refresh = JWTHelper::createToken($id, $user, 60 * 86400)->toString();
        $session->user_id = $user->id;
        $session->ip = $request->ip();
        $session->device = $request->userAgent();
        $session->ts_login = $now;
        if ($session->save()) return $session;
        return null;
    }

    public function check(int $serviceId): bool
    {
        $request = request();
        return ($this->service_id == $serviceId) && (is_null($this->ip) || $this->ip == $request->ip()) && (is_null($this->device) || $this->device == $request->userAgent()) && $this->ts_expire > time();
    }

    public function extend()
    {
        $this->ts_expire = time() + config('session.lifetime');
        $this->save();
        $this->refresh();
    }

    public function modelUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}