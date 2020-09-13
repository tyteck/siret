<?php

namespace Tyteck\Tests;

use PHPUnit\Framework\TestCase;
use Tyteck\Siret\Siret;

class SiretTest extends TestCase
{

    public function testThoseSiretShouldBeValid()
    {
        $validSiretNumbers = [
            '48980080500041',
            '828 680 538 00026',
            '492 677 539 00016',
            '519 464 267 00011',
            ' 418 096 392 03087 ',
            '333 344 000 00109',
        ];

        foreach ($validSiretNumbers as $siretNumber) {
            $this->assertTrue(
                Siret::isValid($siretNumber),
                "Siret number ($siretNumber) should be valid"
            );
        }
    }

    public function testThoseSiretShouldBeInvalid()
    {
        $invalidSiretNumbers = [
            'abcdefghijklmn', // string 
            '1234', // too short
            '1234 4567 8901 234', //too long
            '12345678901234', // dumb
        ];

        foreach ($invalidSiretNumbers as $siretNumber) {
            $this->assertFalse(
                Siret::isValid($siretNumber),
            );
        }
    }
}
