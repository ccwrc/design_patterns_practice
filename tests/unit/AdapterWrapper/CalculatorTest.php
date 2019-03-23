<?php

declare(strict_types=1);

namespace Patterns\tests\unit\AdapterWrapper;

use Patterns\AdapterWrapper\Calculator;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCountryBudget(): void
    {
        $calculator = new Calculator();

        $this->assertFalse($calculator->countryBudget(1, 800) > 0);
    }
}
