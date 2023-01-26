<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

interface CalculatorInterface
{
    public function addNumbers(int $number1, int $number2): int;

    public function multiplyNumbers(int $number1, int $number2): int;

    /**
     * Returns income minus expenses.
     */
    public function countryBudget(int $income, int $expenses): int;
}
