<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ValueObject;

use Patterns\ValueObject\SouthAmericanCountry;
use PHPUnit\Framework\TestCase;

class SouthAmericanCountryTest extends TestCase
{
    /**
     * @return string[]
     */
    public static function validCountry(): array
    {
        return [
            ['Brazil'],
            ['Ecuador'],
            ['Suriname'],
            ['Falkland Islands']
        ];
    }

    /**
     * @return string[]
     */
    public static function invalidCountry(): array
    {
        return [
            ['brazil'],
            ['E1cuador'],
            ['SurinamE'],
            ['FalklandIslands']
        ];
    }

    /**
     * @dataProvider validCountry
     */
    public function testValidCountry(string $country): void
    {
        $southAmericanCountry = new SouthAmericanCountry($country);

        $this->assertInstanceOf(SouthAmericanCountry::class, $southAmericanCountry);
        $this->assertTrue($southAmericanCountry->equals(new SouthAmericanCountry($country)));
        $this->assertSame((string)$southAmericanCountry, $country);
    }

    /**
     * @dataProvider invalidCountry
     */
    public function testInvalidCountry(string $country): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new SouthAmericanCountry($country);
    }
}
