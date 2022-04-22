<?php

namespace App\Http\Helpers;

use App\Models\Session;
use App\Models\User;
use DateTimeImmutable;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token;

class JWTHelper
{
    /** @var Configuration $config */
    private static $config = null;
    private static $secret = 'kblqSTpjs4awdNcxH0yKtYZISg4E8GgqVlS7c6NLvC9lVkXZrtkqxavYnb5VxEPf';

    /**
     * Create a new JWT
     *
     * @param string $id Token ID in Database
     * @param User $user Token owner
     * @param int $validity Token validity in seconds
     *
     * @return Token Generated JWT
     */
    public static function createToken(string $id, User $user, int $validity = 86400): Token
    {
        self::getConfig();
        $now = new DateTimeImmutable();
        return self::$config->builder()
            ->issuedBy(request()->fullUrl())
            ->permittedFor(config('app.URL'))
            ->issuedAt($now)
            ->canOnlyBeUsedAfter($now)
            ->expiresAt(($now)->modify('+' . $validity . ' second' . ($validity != 1 ? 's' : '')))
            ->identifiedBy($id)
            ->relatedTo($user->id)
            ->withClaim('mobile', '09' . $user->username)
            ->getToken(self::$config->signer(), self::$config->signingKey());
    }

    private static function getConfig()
    {
        if (is_null(self::$config)) {
            self::$config = Configuration::forSymmetricSigner(new Sha256(), InMemory::base64Encoded(self::$secret));
        }
    }

    /**
     * Get DB Stored Session from a given JWT
     * @param string|null $token The token to get Session model from
     * @return Builder|Model|object|null
     */
    public static function getSession(?string $token)
    {
        try {
            $token = self::getPayload($token);
            return Session::query()->where('id', $token['jti'])->first();
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Get JWT Payload (2nd Part)
     *
     * @param string|null $token
     * @return array|null
     */
    public static function getPayload(?string $token): ?array
    {
        if (trim($token) === '') return [];
        try {
            return json_decode(base64_decode(explode('.', $token)[1]), true);
        } catch (Exception $e) {
            return [403, 'Unauthorized Access'];
        }
    }

    public static function getSubject(?string $token): ?array
    {
        try {
            $token = self::parseToken($token);
            return json_decode($token->claims()->get('roles', []), true);
        } catch (Exception $e) {
            return [];
        }
    }

    /**
     * Parse string token
     *
     * @param string|null $token
     * @return Token
     * @throws Exception
     */
    public static function parseToken(?string $token): Token
    {
        if (trim($token) === '') throw new Exception('JWT Not Given');
        self::getConfig();
        return self::$config->parser()->parse($token);
    }
}
