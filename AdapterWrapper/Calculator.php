<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

final class Calculator implements CalculatorInterface
{
    public function addNumbers(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function multiplyNumbers(int $number1, int $number2): int
    {
        return $number2 * $number2;
    }

    public function countryBudget(int $income, int $expenses): int
    {
        return $income - $expenses;
    }
}
