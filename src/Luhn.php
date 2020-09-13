<?php

namespace Tyteck\Siret;

class Luhn
{
    /**
     * 
     */
    public static function isValid(int $number): bool
    {
        $sum = 0;
        $revNumber = strrev($number);
        $len = strlen($number);
        for ($i = 0; $i < $len; $i++) {
            $sum += $i & 1 ? ($revNumber[$i] > 4 ? $revNumber[$i] * 2 - 9 : $revNumber[$i] * 2) : $revNumber[$i];
        }
        return $sum % 10 === 0;
    }
}
