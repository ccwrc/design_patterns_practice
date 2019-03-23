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

    public function testIsSomethingCountable(): void
    {
        $array = [
            'Christians',
            'Buddhists'
        ];
        $this->assertTrue(Calculator::isSomethingCountable($array));

        $object = new Calculator();
        $this->assertFalse(Calculator::isSomethingCountable($object));

        $number = 16;
        $this->assertFalse(Calculator::isSomethingCountable($number));
    }
}
