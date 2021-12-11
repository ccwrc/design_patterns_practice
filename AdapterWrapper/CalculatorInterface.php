<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

interface CalculatorInterface
{
    public function addNumbers(int $number1, int $number2): int;

    public function multiplyNumbers(int $number1, int $number2): int;

    /**
     * returns income minus expenses
     *
     * @param int $income
     * @param int $expenses
     *
     * @return int
     */
    public function countryBudget(int $income, int $expenses): int;
}
