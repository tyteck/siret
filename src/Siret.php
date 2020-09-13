<?php

namespace Tyteck\Siret;

class Siret
{
    public const SIRET_LENGTH = 14;

    public static function isValid(string $siretNumber): bool
    {
        $siretNumber = trim($siretNumber);

        /**
         * removing spaces
         */
        $siretNumber = preg_replace('/\s+/', '', $siretNumber);

        if (strlen($siretNumber) !== self::SIRET_LENGTH) {
            return false;
        }

        if (is_numeric($siretNumber)) {
            return Luhn::isValid((int)$siretNumber);
        }

        /**
         * some like "la poste" or monaco's siret does not comply to this.
         */
        return false;
    }
}
