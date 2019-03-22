<?php

declare(strict_types=1);

namespace Patterns\AdapterWrapper;

interface OptimisticCalculatorInterface
{
    /**
     * returns only absolute values
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function optimisticAddNumbers(int $number1, int $number2): int;

    /**
     * returns only absolute values
     * @param int $number1
     * @param int $number2
     * @return int
     */
    public function optimisticMultiplyNumbers(int $number1, int $number2): int;

    /**
     * returns only absolute values
     * @param int $income
     * @param int $expenses
     * @return int
     */
    public function optimisticCountryBudget(int $income, int $expenses): int;
}
