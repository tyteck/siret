<?php

namespace Tyteck\Tests;

use PHPUnit\Framework\TestCase;
use Tyteck\Siret\Luhn;

class LuhnTest extends TestCase
{

    public function testNumbersAreLuhnValid()
    {
        $validLuhnNumbers = [
            1230,
            12302,
            123026,
            1230267,
            12302675,
            123026759,
            123026759092,
            82868053800026,
            49267753900016,
            51946426700011,
        ];

        foreach ($validLuhnNumbers as $luhnNumber) {
            $this->assertTrue(
                Luhn::isValid($luhnNumber),
                "Siret number ($luhnNumber) should be valid"
            );
        }
    }

    public function testThoseNumbersAreNotLuhnValid()
    {
        $invalidLuhnNumbers = [
            1234,
            1230267590,
            123445678901234,
            12345678901234
        ];

        foreach ($invalidLuhnNumbers as $luhnNumber) {
            $this->assertFalse(
                Luhn::isValid($luhnNumber),
            );
        }
    }
}
