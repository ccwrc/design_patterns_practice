<?php

declare(strict_types=1);

namespace Patterns\tests\unit\ValueObject;

use Patterns\ValueObject\SouthAmericanCountry;

use PHPUnit\Framework\TestCase;

class SouthAmericanCountryTest extends TestCase
{
    public function testValidCountry(): void
    {
        $country = new SouthAmericanCountry('Brazil');

        $this->assertInstanceOf(SouthAmericanCountry::class, $country);
    }
}
