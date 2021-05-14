<?php

namespace Tyteck\Siret;

class Siret
{
    public const SIRET_LENGTH = 14;
    public const LAPOSTE_PREFIX = '356000000';

    /**
     * removing spaces from string.
     */
    public static function clean(string $siretNumber)
    {
        return preg_replace('/\s+/', '', $siretNumber);
    }

    public static function isValid(string $siretNumber): bool
    {
        $siretNumber = self::clean($siretNumber);

        if (strlen($siretNumber) !== self::SIRET_LENGTH) {
            return false;
        }
        
        /**
         * La Poste french siret is a specific use case.
         * cf https://blog.pagesd.info/2012/09/05/verifier-numero-siret-poste/
         */
        if (preg_match('/^'.self::LAPOSTE_PREFIX.'[0-9]*/', $siretNumber, $matches)) {
            $sum = array_reduce(str_split($siretNumber), function ($carry, $digit) {
                return $carry+=$digit;
            });
            return $sum % 5 === 0;
        }

        return is_numeric($siretNumber) && Luhn::isValid((int)$siretNumber);
    }
}
