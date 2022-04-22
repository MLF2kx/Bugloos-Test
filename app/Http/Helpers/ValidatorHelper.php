<?php

namespace App\Http\Helpers;

use Brick\Math\BigInteger;
use DateTimeImmutable;
use Exception;
use Illuminate\Support\Str;

class ValidatorHelper
{
    public static function checkBankCardNumber(string $number): bool
    {
        if (!preg_match('#^[0-9]{16}$#', $number)) return false;
        if (intval(substr($number, 0, 10)) == 0 || intval(substr($number, -6)) == 0) return false;
        $digits = str_split($number);
        $sum = 0;
        for ($i = 1; $i <= 16; $i++) {
            $value = intval($digits[$i - 1]) * ($i % 2 == 0 ? 1 : 2);
            if ($value > 9) {
                $value -= 9;
            }
            $sum += $value;
        }
        return $sum % 10 == 0;
    }

    public static function checkIBAN(string $iban): bool
    {
        if (strlen($iban) != 26) return false;
        $letters = range('A', 'Z');
        $code = substr($iban, 0, 4);
        if (($firstLetterValue = array_search(substr($code, 0, 1), $letters)) === false) return false;
        if (($secondLetterValue = array_search(substr($code, 1, 1), $letters)) === false) return false;
        $firstLetterValue += 10;
        $secondLetterValue += 10;
        $code = $firstLetterValue . $secondLetterValue . substr($code, 2);
        $iban = substr($iban, 4) . $code;
        // return DB::select('SELECT ' . $iban . ' MOD 97 AS `value`')[0]->value == 1;
        return BigInteger::fromArbitraryBase($iban, '0123456789')->mod(97)->isEqualTo(1);
    }

    public static function checkMobile(?string $mobile): bool
    {
        return !is_null($mobile) && preg_match('#^[0-39][0-9]{8}$#', self::formatMobile($mobile));
    }

    public static function formatMobile(?string $mobile)
    {
        if (is_null($mobile)) return '';
        return substr(preg_replace('#[^0-9]#', '', $mobile), -9);
    }

    public static function checkNationalCode(string $nationalCode): bool
    {
        if (!preg_match('#^[0-9]{10}$#', $nationalCode)) return false;
        for ($i = 0; $i < 10; $i++) if (preg_match('/^' . $i . '{10}$/', $nationalCode)) return false;
        for ($i = 0, $sum = 0; $i < 9; $i++) {
            $sum += ((10 - $i) * intval(substr($nationalCode, $i, 1)));
        }
        $controlDigit = $sum % 11;
        $parity = intval(substr($nationalCode, -1));
        return ($controlDigit == ($controlDigit < 2 ? $parity : 11 - $parity));
    }

    public static function checkPassword(?string $password): bool
    {
        return !is_null($password) && Str::length($password) >= 8 && preg_match('#(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])#', $password);
    }

    public static function checkPostCode(?string $postcode): bool
    {
        return !is_null($postcode) && preg_match('#^[13-9]{10}$#', $postcode);
    }

    public static function checkToken(?string $token): array
    {
        if (is_null($token) || !JWTHelper::getSession($token)) return [403, 'Unauthorized Access'];
        try {
            $token = JWTHelper::parseToken($token);
        } catch (Exception $e) {
            return [403, 'Invalid Token'];
        }
        if ($token->isExpired(new DateTimeImmutable())) return [401, 'Expired Token'];
        return [200, 'Correct Token'];
    }
}