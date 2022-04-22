<?php

namespace App\Http\Middleware;

use App\Http\Helpers\JWTHelper;
use App\Models\Role;
use Closure;
use DateTimeImmutable;
use Exception;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$token = $request->bearerToken()) return response()->json('JWT Not Given', 403);
        if (!JWTHelper::getSession($token)) return response()->json('Session Not Found', 403);
        try {
            if (JWTHelper::parseToken($token)->isExpired(new DateTimeImmutable())) return response()->json('JWT is Expired', 401);
        } catch (Exception $e) {
            return response()->json('Invalid JWT', 403);
        }
        return $next($request);
    }
}
